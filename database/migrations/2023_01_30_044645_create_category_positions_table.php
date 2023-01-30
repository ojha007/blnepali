<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_positions', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')
                ->on('categories')
                ->references('id');
            $table->integer('front_header_position')->nullable();
            $table->integer('detail_header_position')->nullable();
            $table->boolean('front_body_position')->nullable();
            $table->boolean('detail_body_position')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_positions');
    }
}
