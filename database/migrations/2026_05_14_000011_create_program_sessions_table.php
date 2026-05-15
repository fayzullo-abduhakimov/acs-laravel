<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('program_dates', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('program_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('date_id')->constrained('program_dates')->cascadeOnDelete();
            $table->json('title');
            $table->json('content')->nullable();
            $table->integer('sort')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('program_sessions');
        Schema::dropIfExists('program_dates');
    }
};
