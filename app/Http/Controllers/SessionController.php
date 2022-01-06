<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
}
