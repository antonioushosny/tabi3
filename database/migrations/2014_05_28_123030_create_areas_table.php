<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar')->nullable($value = true);
            $table->string('title_en')->nullable($value = true);
            $table->string('image')->nullable($value = true);
            $table->enum('status', ['active', 'not_active'])->nullable($value = true)->default('active');
            $table->unsignedInteger('country_d')->nullable($value = true);
            $table->unsignedInteger('city_id')->nullable($value = true);
             $table->foreign('country_d')->references('id')->on('countries')->onDelete('set null');
             $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
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
        Schema::dropIfExists('areas');
    }
}
