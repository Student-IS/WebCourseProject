<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealtyObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realty_objects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address')->unique();
            $table->double('cost',19,4);
            $table->unsignedInteger('type_id');
            $table->double('area_total');
            $table->double('area_residential')->nullable();
            $table->double('area_kitchen')->nullable();
            $table->integer('floors');
            $table->integer('floor')->nullable();
            $table->text('ru_description');
            $table->text('en_description')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('realty_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realty_objects');
    }
}
