<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'p_cust_id_client' => $request->input('p_cust_id_client'),
            'p_key' => $request->input('p_key'),
        ];
        $user = User::create($data);
        Auth::login($user);
        Alert::success('Usuario registrado', 'Bienvenido al sistema');
        return redirect()->to('/');
    }
}
