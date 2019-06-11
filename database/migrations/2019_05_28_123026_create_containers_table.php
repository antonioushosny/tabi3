<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('containers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar')->nullable($value = true);
            $table->string('name_en')->nullable($value = true);
            $table->string('size')->nullable($value = true);
            $table->text('desc_ar')->nullable($value = true);
            $table->text('desc_en')->nullable($value = true);
            $table->string('image')->nullable($value = true);
            $table->enum('status', ['active', 'not_active'])->nullable($value = true)->default('active');
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
        Schema::dropIfExists('containers');
    }
}
