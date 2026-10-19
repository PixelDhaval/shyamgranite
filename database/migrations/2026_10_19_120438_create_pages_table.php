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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('pages')->nullOnDelete();
            $table->string('path')->unique();
            $table->string('template', 40);
            $table->string('name');
            $table->string('title');
            $table->string('seo_title')->nullable();
            $table->string('meta_description', 320)->nullable();
            $table->string('summary')->nullable();
            $table->text('intro')->nullable();
            $table->string('photo')->nullable();
            $table->json('content')->nullable();
            $table->json('faqs')->nullable();
            $table->unsignedInteger('sort')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->boolean('noindex')->default(false);
            $table->timestamps();

            $table->index(['parent_id', 'is_published', 'sort']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
