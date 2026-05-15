<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('slug')->nullable();
            $table->json('title');
            $table->json('description');
            $table->json('content')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('order_by')->default(0);
            $table->dateTime('published_date')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
