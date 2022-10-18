<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\User;
use ArrayObject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ->where('status', '=', 'Pendiente')
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
        $userpwd = explode(":", base64_decode(substr($request->header('authorization'), 6)));
        $credentials = [
            'email' => $userpwd[0],
            'password' => $userpwd[1],
        ];
        if(!Auth::attempt($credentials))
        {
            $data = 'Usuario o constraseña invalidos';
            return response()->json(compact('data'));
        }

        if ($request->input() == []) {

            $data = 'Consulta exitosa';
            return response()->json(compact('data'));

        } else if (!DB::table('customers')
            ->where('document_type', '=', $request->input('document_type'))
            ->where('document_number', '=', $request->input('document_number'))
            ->exists()) {

            $data = 'No se encuentran facturas pendientes';
            return response()->json(compact('data'));

        } else {

            $customer = DB::table('customers')
                ->where('document_type', '=', $request->input('document_type'))
                ->where('document_number', '=', $request->input('document_number'))
                ->get();

            $bills = DB::table('bills')
                ->where('customer_id', '=', $customer[0]->id)
                ->where('status', '=', 'Pendiente')
                ->join('customers', 'customers.id', '=', 'bills.customer_id')
                ->select('bills.id', 'bills.tax_base', 'bills.tax', 'bills.amount', 'bills.currency', 'bills.expiration_date', 'bills.description', 'customers.document_type', 'customers.document_number', 'customers.name', 'customers.last_name')
                ->get();

            $data = [];

            foreach ($bills as $bill) {
                array_push($data, array(
                    "id" => $bill->id,
                    "tax_base" => $bill->tax_base,
                    "tax" => $bill->tax,
                    "amount" => $bill->amount,
                    "currency" => $bill->currency,
                    "expiration_date" => $bill->expiration_date,
                    "description" => $bill->description,
                    "document_type" => $bill->document_type,
                    "document_number" => $bill->document_number,
                    "full_name" => $bill->name . ' ' . $bill->last_name
                ));
            }

              return response()->json(compact('data'));
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
