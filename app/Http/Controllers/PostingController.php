<?php

namespace App\Http\Controllers;

use App\Mail\NewPosting;
use App\Mail\PostingCompleted;
use App\Models\Posting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // get query params from url (type, status, search)
        $type = $request->query('type');
        $status = $request->query('status');
        $search = $request->query('search');
        // get all postings
        $postings = Posting::with("user");
        // filter by type
        if ($type) {
            $postings = $postings->where('type', $type);
        }
        // filter by status
        if ($status) {
            $postings = $postings->where('status', $status);
        }
        // filter by search
        if ($search) {
            $postings = $postings->where('title', 'LIKE', '%' . $search . '%');
        }
        // return postings
        return $postings->get();
        // return Posting::with("user")->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = $request->userinfo;
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:8192',
            'type' => 'required|string',
            'status' => 'required|string',
            'location' => 'required|string'
        ]);

        // store image and store the path in the database
        $path = $request->file('image')->storePublicly('public/images');
        $path = str_replace("public", "storage", $path);
        $posting = Posting::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'type' => $request->type,
            'status' => $request->status,
            'user_id' => $user->id,
            'location' => $request->location
        ]);
        if ($posting->type == "lost") {
            // get all volunteers
            $volunteers = User::where('is_volunteer', true)->get();
            // send email to all volunteers
            foreach ($volunteers as $volunteer) {
                Mail::to($volunteer->email, $volunteer->name)->queue(new NewPosting($posting));
            }
        }
        return $posting;
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // get posting with user and messages and user details of each message

        $posting = Posting::with("user", "messages", "messages.user")->find($id);
        return $posting;
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $posting = Posting::find($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:8192',
            'type' => 'required|string',
            'status' => 'required|string',
            'location' => 'required|string'
        ]);
        // store image and store the path in the database
        if ($request->file('image')) {
            $path = $request->file('image')->storePublicly('public/images');
            $path = str_replace("public", "storage", $path);
            $posting->image = $path;
        }
        $posting->title = $request->title;
        $posting->description = $request->description;
        $posting->type = $request->type;
        $posting->status = $request->status;
        $posting->location = $request->location;

        $posting->save();
        return $posting;
    }
    // set status to "COMPLETED"
    public function complete(Request $request, $id)
    {

        $user = $request->userinfo;

        $posting = Posting::with("user", "messages")->find($id);
        if ($posting->user_id != $user->id) {
            return response([
                'message' => 'Unauthorized'
            ], 401);
        }
        $posting->status = "COMPLETED";
        $posting->save();
        // Mail::raw('Your posting has been completed!', function ($message) use ($posting) {
        //     $message->to($posting->user->email, $posting->user->name);
        //     $message->subject('Posting Completed');
        // });
        Mail::to($posting->user->email, $posting->user->name)->queue(new PostingCompleted($posting));
        $posting = Posting::with("user", "messages")->find($id);
        return $posting;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $posting = Posting::find($id);
        $posting->delete();
        return $posting;
    }
}
