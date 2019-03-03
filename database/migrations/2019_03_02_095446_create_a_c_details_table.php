<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateACDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_c_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pc_code')->nullable();
            $table->string('ac_code')->nullable();
            $table->string('ac_name')->nullable();
            $table->string('aro_name')->nullable();
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
        Schema::dropIfExists('a_c_details');
    }
}
