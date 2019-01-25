<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitSensorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kit_sensor', function (Blueprint $table) {
            $table->integer('kit_id')->unsigned();
            $table->integer('sensor_id')->unsigned();
            $table->foreign('kit_id')->references('id')->on('kits')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('created_at')->default(date("Y-m-d H:i:s"));
            $table->primary(array('kit_id','sensor_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kit_sensor');
    }
}
