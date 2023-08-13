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
        Schema::table('play_categories', function(Blueprint $table){
            $table->time('entry_locked_from')->after('name')->nullable();
            $table->time('entry_locked_to')->after('entry_locked_from')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('play_categories', function(Blueprint $table){
            $table->dropColumn(['entry_locked_from', 'entry_locked_to']);
        });
    }
};
