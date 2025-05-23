<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news_sections', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(true)->comment('Активность');
            $table->string('title')->comment('Название');
            $table->string('code')->unique()->index()->comment('Символьный код');
            NestedSet::columns($table);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_sections');
    }
};
