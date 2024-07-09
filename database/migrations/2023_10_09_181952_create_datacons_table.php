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
        Schema::create('datacons', function (Blueprint $table) {
            $table->id();
            $table->string('concertname');
            $table->string('artist');
            $table->text('detail');
            $table->string('imagecon')->nullable();
            $table->string('imagemap')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datacons');
    }
};
