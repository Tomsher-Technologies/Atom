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
        Schema::create('page_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('page_id')->unsigned();
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->string('lang');
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->string('heading1')->nullable();
            $table->text('content1')->nullable();
            $table->string('heading2')->nullable();
            $table->text('content2')->nullable();
            $table->string('heading3')->nullable();
            $table->text('content3')->nullable();
            $table->string('heading4')->nullable();
            $table->text('content4')->nullable();
            $table->string('heading5')->nullable();
            $table->text('content5')->nullable();
            $table->string('heading6')->nullable();
            $table->text('content6')->nullable();
            $table->string('heading7')->nullable();
            $table->text('content7')->nullable();
            $table->string('heading8')->nullable();
            $table->text('content8')->nullable();
            $table->string('heading9')->nullable();
            $table->text('content9')->nullable();
            $table->string('heading10')->nullable();
            $table->string('heading11')->nullable();
            $table->string('heading12')->nullable();
            $table->text('content10')->nullable();
            $table->string('button_text_1')->nullable();
            $table->string('button_text_2')->nullable();   
            $table->string('button_text_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_translations');
    }
};
