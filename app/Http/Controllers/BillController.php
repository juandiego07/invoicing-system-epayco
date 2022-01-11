<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'date' => $request->input('date'),
            'expiration_date' => $request->input('expiration_date'),
            'status' => 'Pendiente',
            'description' => $request->input('description'),
            'user_id' => auth()->user()->id,
        ];

        $customer = Customer::find($request->input('customer'));
        $customer->bills()->create($data);

        $customers = User::find(auth()->user()->id)->customers()->get();

        $bills = DB::table('bills')
            ->where('user_id', '=', auth()->user()->id)
            ->join('customers', 'customers.id', '=', 'bills.customer_id')
            ->select('bills.*', 'customers.name', 'customers.last_name')
            ->get();
        return redirect()->route(
            'bill',
            ['customers' => $customers, 'bills' => $bills]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
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
