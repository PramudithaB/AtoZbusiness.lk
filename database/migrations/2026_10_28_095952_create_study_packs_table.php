<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('study_packs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->nullable()->constrained('class_models')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('grade')->default('12 & 13 ශ්‍රේණි');
            $table->integer('price')->default(2500);
            $table->string('thumbnail')->nullable();
            $table->longText('curriculum_data')->nullable(); // JSON structure for grades, topics, subtopics and video URLs
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('study_packs');
    }
};
