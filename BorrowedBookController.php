<?php

namespace App\Http\Controllers;

use App\Models\BorrowedBook;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    // View all borrowed books
    public function index()
    {
        $borrowedBooks = BorrowedBook::with('user', 'book')->get(); // Adjusted to eager load relationships
        return view('borrowed_books.index', compact('borrowedBooks'));
    }

    // Store a new borrowed record
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);

        BorrowedBook::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrowed_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Book borrowed successfully!');
    }

    // Mark as returned
    public function returnBook($id)
    {
        $borrowedBook = BorrowedBook::findOrFail($id);
        $borrowedBook->returned_at = now();
        $borrowedBook->save();

        return redirect()->back()->with('success', 'Book returned successfully!');
    }

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
