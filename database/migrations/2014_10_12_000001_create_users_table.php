<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name')->nullable($value = true);
            $table->string('email')->nullable($value = true);
            $table->string('password')->nullable($value = true);
            $table->string('mobile')->unique()->nullable($value = true);
            $table->text('address')->nullable($value = true);
            $table->text('desc')->nullable($value = true);
            $table->string('gender')->nullable($value = true);
            $table->string('lat')->nullable($value = true);
            $table->string('lng')->nullable($value = true);
            $table->string('image')->nullable($value = true);
            $table->string('wallet')->nullable($value = true);
            $table->string('device_token')->nullable($value = true);
            $table->string('role');    
            $table->string('status');        
            $table->tinyInteger('available')->nullable($value = true);       
            $table->tinyInteger('type')->nullable($value = true);       
            $table->string('lang')->nullable($value = 'ar');       
            $table->unsignedInteger('country_id')->nullable($value = true);
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null'); 
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
        Schema::dropIfExists('users');
    }
}
