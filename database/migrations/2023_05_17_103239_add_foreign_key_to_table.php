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
        Schema::table('Borrows', function (Blueprint $table) {
            $table->bigInteger('book_isbn');
            $table->foreign('book_isbn')->references('book_isbn')->on('books');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Borrows', function (Blueprint $table) {
            $table->dropForeign(['book_isbn']);
            $table->dropColumn('book_isbn');
        });
    }
};
