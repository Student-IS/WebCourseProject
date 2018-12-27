<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealtyImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realty_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('object_id');
            $table->string('image');
            $table->timestamps();

            $table->foreign('object_id')->references('id')->on('realty_objects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realty_images');
    }
}
