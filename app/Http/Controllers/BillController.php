<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = User::find(auth()->user()->id)->customers()->get();

        $bills = DB::table('bills')
            ->where('user_id', '=', auth()->user()->id)
            ->join('customers', 'customers.id', '=', 'bills.customer_id')
            ->select('bills.*', 'customers.name', 'customers.last_name')
            ->get();

        return view(
            'layouts.bill.index',
            ['customers' => $customers],
            ['bills' => $bills]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = [
            'tax_base' => $request->input('tax_base'),
            'tax' => $request->input('tax'),
            'amount' => $request->input('amount'),
            'currency' => $request->input('currency'),
            'date' => $request->input('date'),
            'expiration_date' => $request->input('expiration_date'),
            'status' => 'Pendiente',
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id,
        ];

        $customer = Customer::find($request->input('customer'));
        $customer->bills()->create($data);
        Alert::success('Registro creado con exito');
        return redirect()->route('bill');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        if ($request->input() == []) {

            $bills = 'Consulta exitosa';
            return response()->json(compact('bills'), 200);
        } else if (!DB::table('customers')
            ->where('document_type', '=', $request->input('document_type'))
            ->where('document_number', '=', $request->input('document_number'))
            ->exists()) {

            $bills = 'No se encuentran facturas pendientes';
            return response()->json(compact('bills'), 200);
        } else {
            $customer = DB::table('customers')
                ->where('document_type', '=', $request->input('document_type'))
                ->where('document_number', '=', $request->input('document_number'))
                ->get();

            $bills = Customer::find($customer[0]->id)->bills()
                ->where('status', '=', 'Pendiente')
                ->where('user_id', '=', auth()->user()->id)
                ->select('id', 'tax_base', 'tax', 'amount', 'currency', 'expiration_date', 'description')
                ->get();

            return response()->json(compact('bills'), 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $affected = Bill::where('id', $id)
            ->update(['status' => 'Anulada']);
        if ($affected) {
            Alert::success('Registro anulado con exito');
            return redirect()->route('bill');
        } else {
            Alert::warning('Registro no encontrado');
            return redirect()->route('bill');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
