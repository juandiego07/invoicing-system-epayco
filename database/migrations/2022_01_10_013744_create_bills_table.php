<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();

            $table->float('tax_base');
            $table->float('tax');
            $table->float('amount');
            $table->date('date');
            $table->date('expiration_date');
            $table->string('status', 50);
            $table->string('description', 150);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
