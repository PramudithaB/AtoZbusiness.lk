<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
{
    if (!Schema::hasTable('lessons')) {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('class_rooms')->onDelete('cascade');
            $table->string('link')->nullable();
            $table->string('tute')->nullable();
            $table->text('notice')->nullable();
            $table->enum('lesson_type', ['paid', 'nonpaid'])->default('paid');
            $table->timestamps();
        });
    }
}


    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
