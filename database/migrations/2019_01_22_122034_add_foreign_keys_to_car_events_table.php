<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToCarEventsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::table('car_events', function (Blueprint $table) {
        $table->foreign('car_id')->references('id')->on('car')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::table('car_event', function (Blueprint $table) {
          //
      });
  }
}
