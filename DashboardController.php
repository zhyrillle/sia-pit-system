<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{public function showdashboard() {
    return view('librarian.dashboard'); // loads Blade template
}
}
        