<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenterContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_containers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('center_id')->nullable($value = true);
            $table->unsignedInteger('container_id')->nullable($value = true);
            $table->string('price')->nullable($value = true);
            $table->foreign('center_id')->references('id')->on('users')->onDelete('cascade'); 
            $table->foreign('container_id')->references('id')->on('containers')->onDelete('cascade'); 
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
        Schema::dropIfExists('center_containers');
    }
}
