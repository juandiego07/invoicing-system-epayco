<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'message' => 'The email and password wrong, please try again'
            ]);
        }
        return redirect()->to('/');
    }

    public function destroy() {
        Auth::logout();
        return redirect('/');
    }
}
