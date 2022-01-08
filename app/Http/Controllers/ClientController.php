<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function create()
    {
        $clients = DB::table('clients')->where('user_id', strval(auth()->user()->id))->get(); //DB::table('clients')->where('user_id', 'John');
        return view('layouts.client.index', [ 'clients' => $clients]);
    }

    public function store(Request $request)
    {
        $data = [
            'document_type' => $request->input('document_type'),
            'document_number' => $request->input('document_number'),
            'phone_number' => $request->input('phone_number'),
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'user_id' => auth()->user()->id,
        ];
        Client::create($data);
        return redirect()->route('client');
    }
}
