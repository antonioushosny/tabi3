<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->string('from')->nullable($value = true);
            $table->string('to')->nullable($value = true);
            $table->string('expiry_date')->nullable($value = true);
            $table->string('install')->nullable($value = true);
            $table->string('cost_advertising')->nullable($value = true);
            $table->string('cost_benefits')->nullable($value = true);
            $table->string('total')->nullable($value = true);
            $table->text('disc')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->dropColumn('from');
            $table->dropColumn('to');
            $table->dropColumn('expiry_date');
            $table->dropColumn('install');
            $table->dropColumn('disc');
        });
    }
}
