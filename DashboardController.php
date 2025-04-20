<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\Staff;

class DashboardController extends Controller
{
    public function index()
    {
        //dd('Loaded admin.dashboard view');

        // Count number of books, users, and staff
        $bookCount = Book::count();
        $userCount = User::count();
        $staffCount = Staff::count();

        // Get all staff members and users (if needed for lists)
        $users = User::all();
        $staffList = Staff::all();

        return view('admin.dashboard', compact('bookCount', 'userCount', 'staffCount', 'users', 'staffList'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function staffList()
    {
        $staff = Staff::all();
        return view('admin.staff', compact('staff'));
    }
}
