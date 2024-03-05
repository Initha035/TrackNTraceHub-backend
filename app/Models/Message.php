<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'body',
        'posting_id',
        'user_id',
    ];

    public function posting()
    {
        return $this->belongsTo(Posting::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
