<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BorrowedBook;

class Book extends Model
{
    // Allow mass assignment for title and author
    protected $fillable = ['title', 'author'];

    // ✅ Relationship: Book has many Borrowed Books
    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }
}
