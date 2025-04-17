<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function showLoginForm() {
        return view('librarian.login'); 
    }

    public function login(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        return view('librarian.home', compact('username', 'password'));
    }
}