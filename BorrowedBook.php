<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    protected $fillable = [
        'user_id',     // Add this to allow mass assignment for user_id
        'book_id',     // Add this to allow mass assignment for book_id
        'borrowed_at', // Add this to allow mass assignment for borrowed_at
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
