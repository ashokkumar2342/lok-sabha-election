<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoothDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booth_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pc_code')->nullable();
            $table->string('ac_code')->nullable();
            $table->string('booth_no')->nullable();
            $table->string('booth_location')->nullable();
            $table->string('booth_name')->nullable(); 
            $table->string('total_booth_pooled')->nullable(); 
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
        Schema::dropIfExists('booth_details');
    }
}
