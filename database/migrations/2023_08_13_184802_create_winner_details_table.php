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
        Schema::create('winner_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('winner_id');
            $table->integer('position');
            $table->integer('value');
            $table->foreign('winner_id')->references('id')->on('winners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winner_details');
    }
};
