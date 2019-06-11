<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_centers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status')->nullable($value = true);
            $table->string('reason')->nullable($value = true);
            $table->string('accept_date')->nullable($value = true);
            $table->string('decline_date')->nullable($value = true);
            $table->unsignedInteger('center_id')->nullable($value = true);
            $table->unsignedInteger('order_id')->nullable($value = true);
            $table->foreign('center_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade'); 
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
        Schema::dropIfExists('order_centers');
    }
}
