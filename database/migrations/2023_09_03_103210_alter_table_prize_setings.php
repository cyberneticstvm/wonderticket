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
        Schema::table('prize_settings', function(Blueprint $table){
            $table->unsignedBigInteger('option_id')->after('id')->references('id')->on('options')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prize_settings', function(Blueprint $table){
            $table->dropColumn('option_id');
        });
    }
};
