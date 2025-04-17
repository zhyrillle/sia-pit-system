<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{public function showhome() {
    return view('librarian.home'); // loads Blade template
}
}