<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrameworkController extends Controller
{
    public function frame() {
        return view('framework');
    }
}
