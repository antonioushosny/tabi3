<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedInteger('city_id')->nullable($value = true);
            $table->unsignedInteger('area_id')->nullable($value = true);
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null'); 
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('city_id');
            $table->dropColumn('area_id');
        });
    }
}
