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
        Schema::create('training_courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('training_categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->bigInteger('lang_id')->unsigned()->nullable();
            $table->foreign('lang_id')->references('id')->on('languages')->onDelete('cascade');
            $table->bigInteger('course_type_id')->unsigned()->nullable();
            $table->foreign('course_type_id')->references('id')->on('course_types')->onDelete('cascade');
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->foreign('location_id')->references('id')->on('states')->onDelete('cascade');
            $table->string('banner_title')->nullable();
            $table->text('banner_content')->nullable();
            $table->string('banner_image');
            $table->text('description')->nullable();
            $table->string('image');
            $table->integer('duration')->nullable();
            $table->decimal('price');
            $table->boolean('status')->default(1);
            $table->integer('sort_order')->default(0);
            $table->string('seo_title')->nullable();
            $table->string('og_title')->nullable();
            $table->string('twitter_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('og_description')->nullable();
            $table->string('twitter_description')->nullable();
            $table->string('keywords')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_courses');
    }
};
