<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;


class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        "body",
        "user_id",
        "image"

    ];

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        /**
         * Get all of the comments for the Book
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function comments()
        {
            return $this->hasMany(Comment::class);
        }

        /**
         * Get all of the likes for the Book
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function likes()
        {
            return $this->hasMany(Like::class);
        }
    
}
