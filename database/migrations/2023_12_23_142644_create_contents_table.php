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
        Schema::create('contents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('synopsis')->nullable();
            $table->enum('type', ['1', '2', '3'])->nullable();
            $table->enum('status', ['1', '2'])->nullable();
            $table->enum('is_rating', ['1', '2'])->nullable();

            $table->string('thumbnail')->nullable();
            $table->string('long_thumbnail')->nullable();
            $table->string('banner')->nullable();
            $table->string('bg_banner')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
