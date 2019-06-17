<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name')->nullable($value = true);
            $table->string('user_mobile')->nullable($value = true);
            $table->string('city')->nullable($value = true);
            $table->string('area')->nullable($value = true);
            $table->string('lat')->nullable($value = true);
            $table->string('lng')->nullable($value = true);
            $table->string('container_name_ar')->nullable($value = true);
            $table->string('container_name_en')->nullable($value = true);
            $table->string('container_size')->nullable($value = true);
            $table->string('price')->nullable($value = true);
            $table->string('total')->nullable($value = true);
            $table->string('no_container')->nullable($value = true);
            $table->string('notes')->nullable($value = true);
            $table->string('status')->nullable($value = true);
            $table->unsignedInteger('user_id')->nullable($value = true);
            $table->unsignedInteger('center_id')->nullable($value = true);
            $table->unsignedInteger('driver_id')->nullable($value = true);
            $table->unsignedInteger('container_id')->nullable($value = true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); 
            $table->foreign('center_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('set null'); 
            $table->foreign('container_id')->references('id')->on('containers')->onDelete('set null'); 
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
        Schema::dropIfExists('orders');
    }
}
