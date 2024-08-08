<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Schedule;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ScheduleController extends Controller
{
    //index
    public function index()
    {
        //with pagination
        $schedules = \App\Models\Schedule::paginate(10);
        // $schedules = \App\Models\Schedule::all();
        return view('pages.schedule.index', compact('schedules'));
    }

    //show
    public function show($id)
    {
        $schedule = \App\Models\Schedule::find($id);
        return view('pages.schedule.show', compact('schedule'));
    }
    //create qrcode
    public function createQrcode(Schedule $schedule)
    {
        $code = $schedule->kode_absensi;
        return view('pages.schedule.qrcode', compact('code'))->with('schedule', $schedule);
    }
    // //generate qrcode
    public function generateQrcode(Request $request, Schedule $schedule)
    {
        $request->validate([
            'code' => 'required',
        ]);
        $schedule->update([
            'kode_absensi' => $request->code,
        ]);
        $code = $request->code;
        return view('pages.schedule.show-qrcode', compact('code'));
    }
    //create
    public function create()
    {
        $subjects = Subject::all(); // Mengambil semua subject dari database
        return view('pages.schedule.create', compact('subjects'));
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id', // pastikan subject_id ada dalam tabel subjects
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruangan' => 'required|string',
            'kode_absensi' => 'nullable|string', // dapat kosong
            'tahun_akademik' => 'nullable|string', // dapat kosong
            'semester' => 'nullable|string', // dapat kosong
        ]);

        $schedule = new Schedule;
        $schedule->subject_id = $request->get('subject_id');
        $schedule->hari = $request->get('hari');
        $schedule->jam_mulai = $request->get('jam_mulai');
        $schedule->jam_selesai = $request->get('jam_selesai');
        $schedule->ruangan = $request->get('ruangan');
        $schedule->kode_absensi = $request->get('kode_absensi');
        $schedule->tahun_akademik = $request->get('tahun_akademik');
        $schedule->semester = $request->get('semester');
        $schedule->save();

        return redirect()->route('schedule.index')->with('success', 'Schedule has been created successfully.');
    }

    //edit
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id); // Menangkap data schedule yang akan diedit
        $subjects = Subject::all(); // Mengambil semua subject untuk dropdown
        return view('pages.schedule.edit', compact('schedule', 'subjects'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruangan' => 'required|string',
            'kode_absensi' => 'nullable|string', // dapat kosong
            'tahun_akademik' => 'nullable|string', // dapat kosong
            'semester' => 'nullable|string', // dapat kosong
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->subject_id = $request->get('subject_id');
        $schedule->hari = $request->get('hari');
        $schedule->jam_mulai = $request->get('jam_mulai');
        $schedule->jam_selesai = $request->get('jam_selesai');
        $schedule->ruangan = $request->get('ruangan');
        $schedule->kode_absensi = $request->get('kode_absensi');
        $schedule->tahun_akademik = $request->get('tahun_akademik');
        $schedule->semester = $request->get('semester');
        $schedule->save();

        return redirect()->route('schedule.index')->with('success', 'Schedule has been updated successfully.');
    }


    //destroy/ delete
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Schedule has been deleted successfully.');
    }
}

