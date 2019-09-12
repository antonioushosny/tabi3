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
            $table->string('cost')->nullable($value = true);
            $table->text('images')->nullable($value = true);
            $table->string('video')->nullable($value = true);
            $table->string('allow_messages')->nullable($value = true);
            $table->string('allow_call')->nullable($value = true);
            $table->string('without_number')->nullable($value = true);
            $table->string('republish')->nullable($value = true);
            $table->string('not_disturb') ->nullable($value = true);
            $table->string('numbers')->nullable($value = true);
            $table->string('lat') ->nullable($value = true);
            $table->string('lng')->nullable($value = true);
            $table->string('views')->nullable($value = true);
            $table->string('favorites')->nullable($value = true);
            $table->string('star')->nullable($value = true);
            $table->string('address')->nullable($value = true);
            $table->string('status')->nullable($value = true);
            $table->unsignedInteger('category_id')->nullable($value = true);
            $table->unsignedInteger('sub_id')->nullable($value = true);
            $table->unsignedInteger('country_id')->nullable($value = true);
            $table->unsignedInteger('city_id')->nullable($value = true);
            $table->unsignedInteger('area_id')->nullable($value = true);
            $table->unsignedInteger('user_id')->nullable($value = true);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null'); 
            $table->foreign('sub_id')->references('id')->on('sub_categories')->onDelete('set null'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); 
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null'); 
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null'); 
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null'); 
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
