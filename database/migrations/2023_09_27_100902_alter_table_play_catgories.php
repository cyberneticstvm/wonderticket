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
            $table->time('play_time')->after('entry_locked_to')->nullable();
            $table->string('class', 25)->after('play_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('play_categories', function(Blueprint $table){
            $table->dropColumn('class');
            $table->dropColumn('class');
        });
    }
};
