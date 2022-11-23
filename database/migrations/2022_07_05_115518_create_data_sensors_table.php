<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sensors', function (Blueprint $table) {
            $table->string('suhu');
            $table->string('ph');
            $table->string('salinitas');
            $table->string('kalmanSuhu');
            $table->string('kalmanPh');
            $table->string('kalmanSalinitas');
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
        Schema::dropIfExists('data_sensors');
    }
}
