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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->text("address")->nullable();
            $table->string("email")->nullable();       
            $table->string("phone")->nullable();    
            $table->string("play_store")->nullable();         
            $table->string("app_store")->nullable();       
            $table->string("facebook")->nullable();         
            $table->string("instagram")->nullable();           
            $table->string("twitter")->nullable();         
            $table->string("linkedin")->nullable();          
            $table->string("footer_content")->nullable();   
            $table->string("footer_content_ar")->nullable();   
            $table->string("header_image")->nullable(); 
            $table->text("image_title")->nullable();
            $table->text("image_title_ar")->nullable();
            $table->text("image_title_sub")->nullable();
            $table->text("image_title_sub_ar")->nullable();
            $table->text("heading")->nullable();
            $table->text("heading_ar")->nullable();
            $table->text("heading_sub")->nullable();
            $table->text("heading_sub_ar")->nullable();
            $table->string("image_link")->nullable();  
            $table->string("header_link")->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
