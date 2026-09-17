<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('category');
            $table->string('rack');
            $table->integer('stock')->default(1);
            $table->string('cover_image_url')->nullable();
            $table->decimal('rating', 3, 1)->default(0.0);
            $table->integer('popularity_score')->default(0); // For ranking
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
