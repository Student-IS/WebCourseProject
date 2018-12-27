<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ru_title');
            $table->string('en_title')->nullable();
            $table->text('ru_text')->nullable();
            $table->text('en_text')->nullable();
            $table->text('ru_short')->nullable();
            $table->text('en_short')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_visible')->default(1);
            $table->boolean('is_date_visible')->default(1);
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
        Schema::dropIfExists('news');
    }
}
