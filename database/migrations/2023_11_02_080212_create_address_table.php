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
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('place_name')->nullable();
            $table->string('ar_place_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('ar_company_name')->nullable();
            $table->text('address')->nullable();
            $table->text('ar_address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
