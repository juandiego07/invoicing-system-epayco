<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmations', function (Blueprint $table) {
            $table->id();

            $table->integer('x_cust_id_cliente');
            $table->integer('x_ref_payco');
            $table->integer('x_id_invoice');
            $table->string('x_transaction_state');
            $table->text('log');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirmations');
    }
}
