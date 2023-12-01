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
            $table->string('title')->nullable();
            $table->longText('description1')->nullable();
            $table->string('image1')->nullable();
            $table->longText('description2')->nullable();
            $table->string('image2')->nullable();
            $table->date('blog_date')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('blogs');
    }
};
