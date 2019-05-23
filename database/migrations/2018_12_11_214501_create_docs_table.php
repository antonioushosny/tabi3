<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable($value = true);
            $table->string('title_ar')->nullable($value = true);
            $table->string('title_en')->nullable($value = true);
            $table->text('disc_ar')->nullable($value = true);
            $table->text('disc_en')->nullable($value = true);
            $table->string('type')->nullable($value = true);
            $table->enum('status', ['active', 'not_active'])->default('active');
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
        Schema::dropIfExists('docs');
    }
}
