<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceGeoLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_geo_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id')->unsigned()->index();
            $table->decimal('lat', 10, 6);
            $table->decimal('lng', 10, 6);
            $table->timestamp('taken_at');

            $table->foreign('device_id')
                ->references('id')->on('devices')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_geo_locations');
    }
}
