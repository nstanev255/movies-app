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
        Schema::create('producer_movie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producer_id');
            $table->unsignedBigInteger('movie_id');

            $table->foreign('producer_id')->references('id')
                ->on('producers')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')
                ->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people_movies');
    }
};
