<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable($value = true);
            $table->string('points')->nullable($value = true);
            $table->string('status')->nullable($value = true)->default('0');
            $table->unsignedInteger('user_id')->nullable($value = true);
            $table->unsignedInteger('deal_id')->nullable($value = true);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('deal_id')->references('id')->on('deals')->onDelete('set null');
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
        Schema::dropIfExists('tickets');
    }
}
