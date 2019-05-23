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
            $table->string('user_name')->nullable($value = true);
            $table->string('name')->nullable($value = true);
            $table->string('email')->nullable($value = true);
            $table->string('password')->nullable($value = true);
            $table->string('mobile')->unique()->nullable($value = true);
            $table->string('birth_date')->nullable($value = true);
            $table->string('job')->nullable($value = true);
            $table->string('gender')->nullable($value = true);
            $table->string('points')->nullable($value = true);
            $table->string('coupons')->nullable($value = true);
            $table->string('image')->nullable($value = true);
            $table->string('device_token')->nullable($value = true);
            $table->enum('role', ['admin','user']);    
            $table->enum('status', ['active', 'not_active']);        
            $table->tinyInteger('available')->nullable($value = true);       
            $table->tinyInteger('interested')->nullable($value = true);       
            $table->tinyInteger('type')->nullable($value = true);       
            $table->unsignedInteger('country_id')->nullable($value = true);
            $table->unsignedInteger('city_id')->nullable($value = true);
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null'); 
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null'); 
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
