<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\signupRequest;
use Illuminate\Support\Facades\Session;

class SignupController extends Controller
{
    public function index() {
        return view('signup');
    }
    public function displayInfor(signupRequest $request) {
        $userSession = session('userSession', []);

        $user = [
            'name' => $request -> input("name"),
            'age' => $request -> input("age"),
            'date' => $request -> input("date"),
            'phone' => $request -> input("phone"),
            'web' => $request -> input("web"),
            'address' => $request -> input("address"),
        ];

        $userSession[] = $user;
        session(['userSession' => $userSession]);
        return view('signup')->with('userSession', $userSession);
    }

    public function clear() {
        Session::forget('userSession');
        return redirect('/');
    }
}
