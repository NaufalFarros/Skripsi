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
            $table->double('suhu');
            $table->double('ph');
            $table->double('salinitas');
            $table->double('kalmanSuhu');
            $table->double('kalmanPh');
            $table->double('kalmanSalinitas');
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
