<?php

namespace App\Http\Controllers;

use App\Models\Confirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ConfirmationController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $data = [
            'x_cust_id_cliente' => intval($request->input('x_cust_id_cliente')),
            'x_ref_payco' => intval($request->input('x_ref_payco')),
            'x_id_invoice' => intval($request->input('x_id_invoice')),
            'x_transaction_state' => $request->input('x_transaction_state'),
            'log' => json_encode(file_get_contents("php://input")),
        ];
        
        $result = DB::table('bills')
            ->where('id', '=', intval($request->input('x_id_invoice')))
            // ->where('user_id', '=', auth()->user()->id)
            ->get();

        if ($result->isEmpty()) {
            $response = array(
                'method' => $_SERVER['REQUEST_METHOD'],
                'status' => 'Factura no encontrada',
            );
            return $response;
        } else if ($result['0']->status == 'Pendiente' && $request->input('x_cod_response') == 1 && $request->input('x_test_request') == 'FALSE') {
            $update = DB::table('bills')
                ->where('id', '=', intval($request->input('x_id_invoice')))
                ->where('user_id', '=', auth()->user()->id)
                ->update(['status' => 'Pagada']);

            if($update){
                $response = array(
                    'method' => $_SERVER['REQUEST_METHOD'],
                    'status' => 'Pago aplicado con exito',
                    'data' => json_encode(file_get_contents("php://input"))
                );
            }else{
                $response = array(
                    'method' => $_SERVER['REQUEST_METHOD'],
                    'status' => 'Pago no se aplicó con exito',
                    'data' => json_encode(file_get_contents("php://input"))
                );
            }
            Confirmation::create($data);
            return $response;
        } else {
            $response = array(
                'method' => $_SERVER['REQUEST_METHOD'],
                'status' => 'Registro guardado con exito',
                'data' => json_encode(file_get_contents("php://input"))
            );
            Confirmation::create($data);
            return $response;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Confirmation  $confirmation
     * @return \Illuminate\Http\Response
     */
    public function show(Confirmation $confirmation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Confirmation  $confirmation
     * @return \Illuminate\Http\Response
     */
    public function edit(Confirmation $confirmation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Confirmation  $confirmation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confirmation $confirmation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Confirmation  $confirmation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Confirmation $confirmation)
    {
        //
    }
}
