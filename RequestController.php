<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{public function showrequest() {
    return view('librarian.request'); // loads Blade template
}
}
