<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AbsensiMatkul;
use Illuminate\Http\Request;

class AbsensiMatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil pengguna yang terautentikasi
        $user = $request->user();

        // Mengambil data AbsensiMatkul berdasarkan student_id pengguna yang terautentikasi dan mengurutkan hasil secara menurun
        $absensiMatkul = AbsensiMatkul::where('matakuliah_id', '=', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Mengembalikan data absensi mata kuliah dalam format JSON
        return $absensiMatkul;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari permintaan
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id', // Validasi jika schedule_id harus ada dalam tabel schedules
            'kode_absensi' => 'required|string',
            'tahun_akademik' => 'required|string',
            'semester' => 'required|string',
            'pertemuan' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        // Mengambil pengguna yang terautentikasi
        $user = $request->user();

        // Menambahkan data student_id dan informasi pembuat serta pengupdate data
        $request->merge([
            'matakuliah_id' => $user->id,
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ]);

        // Membuat entri baru dalam tabel absensi mata kuliah
        $absensiMatkul = AbsensiMatkul::create($request->all());

        // Mengembalikan data absensi mata kuliah yang baru dibuat
        return $absensiMatkul;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan data absensi mata kuliah berdasarkan ID
        $absensiMatkul = AbsensiMatkul::findOrFail($id);

        // Mengembalikan data absensi mata kuliah dalam format JSON
        return $absensiMatkul;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Mengambil data absensi mata kuliah berdasarkan ID
        $absensiMatkul = AbsensiMatkul::findOrFail($id);

        // Mengambil pengguna yang terautentikasi
        $user = $request->user();

        // Menambahkan informasi pengupdate data
        $request->merge([
            'updated_by' => $user->id,
        ]);

        // Mengupdate data absensi mata kuliah
        $absensiMatkul->update($request->all());

        // Mengembalikan data absensi mata kuliah yang telah diperbarui
        return $absensiMatkul;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mengambil data absensi mata kuliah berdasarkan ID
        $absensiMatkul = AbsensiMatkul::findOrFail($id);

        // Menghapus data absensi mata kuliah
        $absensiMatkul->delete();

        // Mengembalikan respons sukses setelah penghapusan
        return response()->json(['message' => 'Absensi Matkul deleted successfully.'], 200);
    }
}
