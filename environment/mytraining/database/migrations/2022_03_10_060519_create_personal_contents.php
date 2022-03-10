<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalContents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bodypart_name');
            $table->string('training_name');
            $table->integer('set_data');
            $table->integer('weight_data');
            $table->integer('count_data');
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
        Schema::dropIfExists('personal_contents');
    }
}
