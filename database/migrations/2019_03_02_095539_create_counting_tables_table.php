<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountingTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counting_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pc_code')->nullable();
            $table->string('ac_code')->nullable();
            $table->string('table_no')->nullable();
            $table->string('counting_supervisor_name')->nullable();
            
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
        Schema::dropIfExists('counting_tables');
    }
}
