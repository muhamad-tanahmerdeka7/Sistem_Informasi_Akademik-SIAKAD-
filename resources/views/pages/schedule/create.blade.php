@extends('layouts.app')

@section('title', 'Create Schedule')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Schedule</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Schedule</a></div>
                    <div class="breadcrumb-item">Create Schedule</div>
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
                                <h4>Create New Schedule</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('schedule.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subject_id">Subject</label>
                                                <select name="subject_id" id="subject_id" class="form-control selectric">
                                                    @foreach ($subjects as $subject)
                                                        <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subject_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="hari">Day</label>
                                                <input type="text" class="form-control" id="hari" name="hari" value="{{ old('hari') }}">
                                                @error('hari')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam_mulai">Start Time</label>
                                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai') }}">
                                                @error('jam_mulai')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jam_selesai">End Time</label>
                                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai') }}">
                                                @error('jam_selesai')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ruangan">Room</label>
                                                <input type="text" class="form-control" id="ruangan" name="ruangan" value="{{ old('ruangan') }}">
                                                @error('ruangan')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kode_absensi">Attendance Code</label>
                                                <input type="text" class="form-control" id="kode_absensi" name="kode_absensi" value="{{ old('kode_absensi') }}">
                                                @error('kode_absensi')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tahun_akademik">Academic Year</label>
                                                <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" value="{{ old('tahun_akademik') }}">
                                                @error('tahun_akademik')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="semester">Semester</label>
                                                <input type="text" class="form-control" id="semester" name="semester" value="{{ old('semester') }}">
                                                @error('semester')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ route('schedule.index') }}" class="btn btn-secondary">Cancel</a>
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
