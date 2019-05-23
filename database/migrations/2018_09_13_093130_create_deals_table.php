<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {           
            $table->increments('id');                                      
            $table->string('title_ar')->nullable($value = true);              
            $table->string('title_en')->nullable($value = true);              
            $table->string('original_price')->nullable($value = true);                  
            $table->string('initial_price')->nullable($value = true);                  
            $table->string('points')->nullable($value = true);                  
            $table->string('tickets')->nullable($value = true);                  
            $table->string('tender_cost')->nullable($value = true);                  
            $table->string('tender_edit_cost')->nullable($value = true);                  
            $table->string('tender_coupon')->nullable($value = true);                  
            $table->text('disc_ar')->nullable($value = true);                        
            $table->text('disc_en')->nullable($value = true);                        
            $table->text('info_ar')->nullable($value = true);                        
            $table->text('info_en')->nullable($value = true);                        
            $table->text('image')->nullable($value = true);                  
            $table->text('images')->nullable($value = true);                  
            $table->timestamp('expiry_date')->nullable($value = true);                  
            $table->string('status')->nullable($value = true);         
            $table->unsignedInteger('category_id')->nullable($value = true);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->unsignedInteger('sub_id')->nullable($value = true);
            $table->foreign('sub_id')->references('id')->on('sub_categories')->onDelete('set null');     
            $table->unsignedInteger('country_id')->nullable($value = true);
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');                                       
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
        Schema::dropIfExists('deals');
    }
}
