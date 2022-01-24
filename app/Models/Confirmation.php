<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    use HasFactory;

    protected $fillable = [
        'x_cust_id_cliente',
        'x_ref_payco',
        'x_id_invoice',
        'x_transaction_state',
        'log',
    ];
}
