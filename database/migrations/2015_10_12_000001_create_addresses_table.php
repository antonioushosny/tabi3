<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable($value = true);
            $table->text('disc')->nullable($value = true);
            $table->string('zip_code')->nullable($value = true);
            $table->string('mobile')->nullable($value = true);
            $table->unsignedInteger('country_id')->nullable($value = true);
            $table->unsignedInteger('city_id')->nullable($value = true);
            $table->unsignedInteger('user_id')->nullable($value = true);
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null'); 
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->rememberToken();
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
        Schema::dropIfExists('addresses');
    }
}
