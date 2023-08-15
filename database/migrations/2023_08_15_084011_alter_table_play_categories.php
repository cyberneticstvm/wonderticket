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
            $table->boolean('status')->after('entry_locked_to')->comment('1-active, 0-inactive')->default(1);
            $table->dateTime('created_at')->after('status')->nullable();
            $table->dateTime('updated_at')->after('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('play_categories', function(Blueprint $table){
            $table->dropColumn('status');
        });
    }
};
