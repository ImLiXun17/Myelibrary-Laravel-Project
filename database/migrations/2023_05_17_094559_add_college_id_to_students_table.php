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
        Schema::table('Students', function (Blueprint $table) {
            $table->unsignedBigInteger('Colleges_id');
            $table->foreign('Colleges_id')->references('id')->on('Colleges');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Students', function (Blueprint $table) {
            $table->dropForeign(['Colleges_id']);
            $table->dropColumn('Colleges_id');
        });
    }
};
