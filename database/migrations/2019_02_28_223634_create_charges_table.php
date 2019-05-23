<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name')->nullable($value = true);
            $table->string('package')->nullable($value = true);
            $table->string('points')->nullable($value = true);
            $table->unsignedInteger('package_id')->nullable($value = true);
            $table->unsignedInteger('user_id')->nullable($value = true);
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
        Schema::dropIfExists('charges');
    }
}
