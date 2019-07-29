<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable($value = true);
            $table->string('amount')->nullable($value = true);
            $table->string('date')->nullable($value = true);
            $table->string('file')->nullable($value = true);
            $table->string('image')->nullable($value = true);
            $table->unsignedInteger('user_id')->nullable($value = true);
            $table->unsignedInteger('payment_id')->nullable($value = true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade'); 
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
        Schema::dropIfExists('payment_details');
    }
}
