<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'content',
        'image',
    ];

    // Relasi dengan User (pemilik post)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Like
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Relasi dengan Comment
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
