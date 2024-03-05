<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:8192',
            'body' => 'string',
            'posting_id' => 'required|integer',
        ]);
        // store image and store the path in the database
        $path = $request->file('image')->storePublicly('public/images');
        $path = str_replace("public", "storage", $path);
        $message = Message::create([
            'image' => $path,
            'body' => $request->body,
            'posting_id' => $request->posting_id,
            'user_id' => $request->userinfo->id,
        ]);
        $message = Message::with("user")->find($message->id);
        return $message;
    }
}
