<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('np_news', function (Blueprint $table) {
            $table->id();

            $table->mediumText('title');
            $table->bigInteger('c_id')->index();

            $table->foreignId('category_id')
                ->references('id')
                ->on('categories');

            $table->unique(['category_id', 'c_id']);

            $table->mediumText('sub_title')->nullable();

            $table->foreignId('guest_id')->constrained('guests');

            $table->unsignedBigInteger('reporter_id')->nullable();
            $table->foreign('reporter_id')
                ->references('id')
                ->on('reporters');
            $table->boolean('is_anchor')->default(false);
            $table->boolean('is_special')->default(false);
            $table->mediumText('image');
            $table->text('image_description')->nullable();
            $table->dateTimeTz('publish_date')->index();

            $table->mediumText('video_url')->nullable();
            $table->mediumText('external_url')->nullable();

            $table->bigInteger('view_count')->default(1);

            $table->mediumText('short_description')->nullable();
            $table->longText('description');
            $table->string('date_line')->nullable();

            $table->string('slug')->nullable();
            $table->string('image_alt')->nullable();
            $table->foreignId('created_by')
                ->references('id')
                ->on('users');
            $table->foreignId('updated_by')
                ->nullable()
                ->references('id')
                ->on('users');
            $table->foreignId('deleted_by')
                ->nullable()
                ->references('id')
                ->on('users');
            $table->boolean('is_breaking')->default(false);

            $table->enum('status', ['active', 'draft'])->default('active');

            $table->timestamps();
            $table->softDeletes();

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
