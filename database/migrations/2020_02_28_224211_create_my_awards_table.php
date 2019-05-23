<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_awards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar')->nullable($value = true);
            $table->string('title_en')->nullable($value = true);
            $table->string('coupons')->nullable($value = true);
            $table->text('image')->nullable($value = true);
            $table->timestamp('expiry_date')->nullable($value = true); 
            $table->string('status')->nullable($value = true); 
            $table->unsignedInteger('user_id')->nullable($value = true);
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
        Schema::dropIfExists('my_awards');
    }
}
