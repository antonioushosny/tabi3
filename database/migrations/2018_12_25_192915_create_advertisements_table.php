<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable($value = true);
            $table->string('image')->nullable($value = true);
            $table->string('link')->nullable($value = true);
            $table->string('type') ->nullable($value = true);
            $table->string('page') ->nullable($value = true);
            $table->unsignedInteger('package_id')->nullable($value = true);
            $table->unsignedInteger('user_id')->nullable($value = true);
            $table->string('number')->nullable($value = true);
            $table->string('cost')->nullable($value = true);
            $table->string('total')->nullable($value = true);
            $table->string('start_date')->nullable($value = true);
            $table->string('expiry_date')->nullable($value = true);
            $table->string('status')->nullable($value = true);
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('set null'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); 

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
        Schema::dropIfExists('advertisements');
    }
}
