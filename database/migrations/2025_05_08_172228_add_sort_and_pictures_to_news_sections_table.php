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
        Schema::table('news_sections', function (Blueprint $table) {
            $table->integer('sort')->default(500)->after('updated_at');

            $table->string('preview_picture')->nullable()->after('sort');
            $table->string('detail_picture')->nullable()->after('preview_picture');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_sections', function (Blueprint $table) {
            $table->dropColumn(['sort', 'preview_picture', 'detail_picture']);
        });
    }
};
