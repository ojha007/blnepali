<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('np_news', function (Blueprint $table) {
            $table->boolean('is_banner')->default(false);
            $table->boolean('image_visible')->default(false);
            $table->boolean('banner_position')->nullable();
            $table->index(['c_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('np_news', function (Blueprint $table) {
            $table->dropColumn('is_banner');
            $table->dropColumn('image_visible');
            $table->dropColumn('banner_position');
        });
    }
};
