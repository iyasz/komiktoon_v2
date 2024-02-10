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
            $table->string('author')->nullable();

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('synopsis')->nullable();
            $table->enum('is_ongoing', ['1', '2'])->nullable();
            $table->enum('status', ['1', '2', '3', '4'])->nullable();
            $table->enum('update_day', ['0', '1', '2', '3', '4', '5', '6'])->nullable();
            $table->enum('update_day_2', ['0', '1', '2', '3', '4', '5', '6'])->nullable();

            $table->text('thumbnail')->nullable();
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
