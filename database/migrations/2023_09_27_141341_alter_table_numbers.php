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
        Schema::table('numbers', function(Blueprint $table){
            $table->unsignedBigInteger('play_category')->after('play_id')->references('id')->on('play_categories')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('numbers', function(Blueprint $table){
            $table->dropColumn('play_category');
        });
    }
};
