<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number');
            $table->string('candidate_name')->nullable();
            $table->string('party_name')->nullable();
            $table->string('party_symbol')->nullable();
            $table->text('remarks')->nullable();
            $table->boolean('status')->default(1); 
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
        Schema::dropIfExists('candidate_details');
    }
}
