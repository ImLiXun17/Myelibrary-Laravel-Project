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
            $table->foreign('colleges_id')->references('id')->on('colleges');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Students', function (Blueprint $table) {
            $table->dropForeign(['colleges_id']);
            $table->dropColumn('Colleges_id');
        });
    }
};
