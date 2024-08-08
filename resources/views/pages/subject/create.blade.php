@extends('layouts.app')

@section('title', 'Create Subject')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Subject</h1>
            </div>
            <div class="section-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form action="{{ route('subject.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lecturer_id">Lecturer</label>
                        <select name="lecturer_id" class="form-control" required>
                            @foreach($lecturers as $lecturer)
                                <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semesters">Semester</label>
                        <input type="text" name="semesters" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="academic_year">Academic Year</label>
                        <input type="text" name="academic_year" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input type="number" name="sks" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" name="code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </section>
    </div>
@endsection
