<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDelegateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delegate_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('location_id')->nullable($value = true);
            $table->unsignedInteger('delegate_id')->nullable($value = true);
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('delegate_id')->references('id')->on('delegates')->onDelete('cascade');
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
        Schema::dropIfExists('delegate_locations');
    }
}
