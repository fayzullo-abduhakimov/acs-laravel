<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('archive_news', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->json('title');
            $table->json('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('order_by')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('archive_news');
    }
};
