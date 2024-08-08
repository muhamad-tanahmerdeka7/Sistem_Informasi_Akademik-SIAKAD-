@extends('layouts.app')

@section('title', 'Edit Schedule')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Schedule</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Schedule</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('schedule.index') }}">All Schedules</a></div>
                    <div class="breadcrumb-item">Edit Schedule</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Schedule</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('schedule.update', $schedule->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <select id="subject" name="subject_id" class="form-control">
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}"
                                                    {{ $subject->id == $schedule->subject_id ? 'selected' : '' }}>
                                                    {{ $subject->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="day">Day</label>
                                        <input type="text" id="day" name="hari" class="form-control"
                                            value="{{ old('hari', $schedule->hari) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="start_time">Start Time</label>
                                        <input type="time" id="start_time" name="jam_mulai" class="form-control"
                                            value="{{ old('jam_mulai', $schedule->jam_mulai) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="end_time">End Time</label>
                                        <input type="time" id="end_time" name="jam_selesai" class="form-control"
                                            value="{{ old('jam_selesai', $schedule->jam_selesai) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="room">Room</label>
                                        <input type="text" id="room" name="ruangan" class="form-control"
                                            value="{{ old('ruangan', $schedule->ruangan) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="attendance_code">Attendance Code</label>
                                        <input type="text" id="attendance_code" name="kode_absensi" class="form-control"
                                            value="{{ old('kode_absensi', $schedule->kode_absensi) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="academic_year">Academic Year</label>
                                        <input type="text" id="academic_year" name="tahun_akademik" class="form-control"
                                            value="{{ old('tahun_akademik', $schedule->tahun_akademik) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <input type="text" id="semester" name="semester" class="form-control"
                                            value="{{ old('semester', $schedule->semester) }}">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Schedule</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
