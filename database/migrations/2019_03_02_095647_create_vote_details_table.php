<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_details', function (Blueprint $table) {
            $table->increments('id');
             $table->string('pc_code')->nullable();
            $table->string('ac_code')->nullable();
            $table->string('table_no')->nullable();
            $table->string('round_no')->nullable();
            $table->string('booth_no')->nullable();
            $table->string('candidate_id')->nullable();
            $table->string('vote_polled')->nullable();
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
        Schema::dropIfExists('vote_details');
    }
}
