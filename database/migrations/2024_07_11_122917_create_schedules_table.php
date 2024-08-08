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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')
                  ->constrained('subjects')
                  ->onDelete('cascade'); // Menambahkan ON DELETE CASCADE
            $table->string('hari');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->string('ruangan');
            $table->string('kode_absensi')->nullable();
            $table->string('tahun_akademik')->nullable();
            $table->string('semester')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
