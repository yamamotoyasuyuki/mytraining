<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodypartPostcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_part_post_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('body_part_id');
            $table->unsignedBigInteger('post_category_id');
            $table->primary(['body_part_id','post_category_id']);
            $table->foreign('body_part_id')->references('id')->on('body_parts');
            $table->foreign('post_category_id')->references('id')->on('post_categories');
            // $table->dropForeign('bodypart_postcategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bodypart_postcategories');
        // Schema::table('bodypart_postcategories', function (Blueprint $table) {
        // $table->foreign('body_part_id')->references('id')->on('body_parts');
        // $table->foreign('post_category_id')->references('id')->on('post_categories');
        //  });
    }
}
