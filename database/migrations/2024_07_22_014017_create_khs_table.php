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
        Schema::create('khs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('users');
            $table->foreignId('matakuliah_id')->constrained('subjects');
            $table->string('pertemuan');
            $table->string('nilai');
            $table->string('grade')->nullable();
            // $table->string('grade')->default('N/A'); // Menambahkan nilai default pada kolom grade
            $table->string('keterangan');
            $table->string('tahun_akademik');
            $table->string('semester');
            $table->string('status');
            $table->string('kode_absensi');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('created_by');
            $table->string('updated_by');
            $table->string('deleted_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khs');
    }
};
