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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->string('author');
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'blog_author_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'blog_category_id'
            ); 
            $table->string('slug')->unique();
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
