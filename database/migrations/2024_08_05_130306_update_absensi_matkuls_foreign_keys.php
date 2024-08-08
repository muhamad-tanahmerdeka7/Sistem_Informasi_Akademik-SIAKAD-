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
        Schema::table('absensi_matkuls', function (Blueprint $table) {
           // Drop existing foreign key constraint
           $table->dropForeign(['matakuliah_id']);

           // Re-add foreign key constraint with ON DELETE CASCADE
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
       Schema::table('absensi_matkuls', function (Blueprint $table) {
           // Drop foreign key constraint with cascade
           $table->dropForeign(['matakuliah_id']);

           // Re-add original foreign key constraint
           $table->foreign('matakuliah_id')
                 ->references('id')
                 ->on('subjects');
       });
   }
};
