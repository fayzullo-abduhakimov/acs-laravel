<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->string('link')->nullable();
            $table->tinyInteger('position')->default(1);
            $table->foreignId('parent_id')->nullable()->constrained('menus')->nullOnDelete();
            $table->tinyInteger('order_by')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
