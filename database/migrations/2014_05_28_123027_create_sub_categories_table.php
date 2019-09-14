<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_ar')->nullable($value = true);
            $table->string('title_en')->nullable($value = true);
            $table->string('image')->nullable($value = true);
            $table->enum('status', ['active', 'not_active'])->nullable($value = true)->default('active');
            $table->unsignedInteger('category_id')->nullable($value = true);
            $table->unsignedInteger('parent_id')->nullable($value = true);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('parent_id')->references('id')->on('sub_categories')->onDelete('set null');
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
        Schema::dropIfExists('sub_categories');
    }
}
