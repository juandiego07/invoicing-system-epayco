<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->string('document_type',3);
            $table->integer('document_number');
            $table->unsignedBigInteger('user_id');
            $table->string('phone_number',50);
            $table->string('name',50);
            $table->string('last_name',50);
            $table->string('email',50);
            $table->string('address',150);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['document_type', 'document_number', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
