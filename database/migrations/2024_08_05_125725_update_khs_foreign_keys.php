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
        Schema::table('khs', function (Blueprint $table) {
             // Drop existing foreign key constraints
             $table->dropForeign(['mahasiswa_id']);
             $table->dropForeign(['matakuliah_id']);

             // Re-add foreign key constraints with ON DELETE CASCADE
             $table->foreign('mahasiswa_id')
                   ->references('id')
                   ->on('users')
                   ->onDelete('cascade');

             $table->foreign('matakuliah_id')
                   ->references('id')
                   ->on('subjects')
                   ->onDelete('cascade');
         });
     }

     /**
      * Reverse the migrations.
      */
     public function down(): void
     {
         Schema::table('khs', function (Blueprint $table) {
             // Drop foreign key constraints with cascade
             $table->dropForeign(['mahasiswa_id']);
             $table->dropForeign(['matakuliah_id']);

             // Re-add original foreign key constraints
             $table->foreign('mahasiswa_id')
                   ->references('id')
                   ->on('users');

             $table->foreign('matakuliah_id')
                   ->references('id')
                   ->on('subjects');
         });
     }
 };
