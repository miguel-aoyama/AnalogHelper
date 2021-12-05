<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title');
          $table->integer('rate');
          $table->integer('delaytime');
          $table->string('range');
          $table->integer('lfo');
          $table->integer('pwm');
          $table->string('env');
          $table->boolean('subb');
          $table->integer('sub');
          $table->integer('noise');
          $table->integer('freq');
          $table->integer('vfreq');
          $table->integer('res');
          $table->boolean('envb');
          $table->integer('venv');
          $table->integer('vlfo');
          $table->integer('kybd');
          $table->boolean('levelb');
          $table->integer('level');
          $table->integer('a');
          $table->integer('d');
          $table->integer('s');
          $table->integer('r');
          $table->unsignedInteger('user_id');
          $table->unsignedInteger('category_id');
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
        Schema::dropIfExists('boards');
    }
}
