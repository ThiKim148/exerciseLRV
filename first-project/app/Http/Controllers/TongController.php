<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TongController extends Controller
{
    public function cong(Request $request)
    {
        $num1 = $request->input('soa');
        $num2 = $request->input('sob');
        $sum = $num1 + $num2;
        return view('welcome', ['tong' => $sum]); 
    }
}