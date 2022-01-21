<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

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

            Alert::error('Error', 'Usuario o contraseña incorrectos');
            return back();
        }

        Alert::success('Acceso correcto', 'Bienvenido al sistema');
        return redirect()->to('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }

    public function authenticate(Request $request)
    {

        $data = explode(":", base64_decode(substr($request->header('authorization'), 6)));
        $userpwd['email'] = $data[0];
        $userpwd['password'] = $data[1];
        $credentials = $userpwd;

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciasles invalidas'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo crear token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e);
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e);
        } catch (JWTException $e) {
            return response()->json(['token_absent'], $e);
        }
        return response()->json(compact('user'));
    }
}
