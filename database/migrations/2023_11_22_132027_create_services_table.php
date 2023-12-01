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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('banner_content')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image1')->nullable();
            $table->string('heading1')->nullable();
            $table->text('content1')->nullable();
            $table->string('image2')->nullable();
            $table->string('heading2')->nullable();
            $table->text('content2')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('sort_order')->default(0);
            $table->string('seo_title')->nullable();
            $table->string('og_title')->nullable();
            $table->string('twitter_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('og_description')->nullable();
            $table->string('twitter_description')->nullable();
            $table->string('keywords')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
