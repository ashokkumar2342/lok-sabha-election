<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountingTableBoothMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counting_table_booth_maps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pc_code')->nullable();
            $table->string('ac_code')->nullable();
            $table->string('table_no')->nullable();
            $table->string('round_no')->nullable();
            $table->string('booth_no')->nullable();
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
        Schema::dropIfExists('counting_table_booth_maps');
    }
}
