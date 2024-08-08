@extends('layouts.app')

@section('title', 'Edit Subject')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Subject</h1>
            </div>
            <div class="section-body">
                <form action="{{ route('subject.update', $subject->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $subject->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="lecturer_id">Lecturer ID</label>
                        <input type="text" name="lecturer_id" class="form-control" value="{{ $subject->lecturer_id }}" required>
                    </div>
                    <div class="form-group">
                        <label for="semesters">Semester</label>
                        <input type="text" name="semesters" class="form-control" value="{{ $subject->semesters }}" required>
                    </div>
                    <div class="form-group">
                        <label for="academic_year">Academic Year</label>
                        <input type="text" name="academic_year" class="form-control" value="{{ $subject->academic_year }}" required>
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input type="number" name="sks" class="form-control" value="{{ $subject->sks }}" required>
                    </div>
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" name="code" class="form-control" value="{{ $subject->code }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" required>{{ $subject->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </section>
    </div>
@endsection
