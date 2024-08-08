<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    //index
    public function index()
    {
        //with pagination
        $subjects = \App\Models\Subject::paginate(10);
        // $subjects = \App\Models\Subject::all();
        return view('pages.subject.index', compact('subjects'));
    }

    //create
    public function create()
    {
        $lecturers = User::all();
        return view('pages.subject.create', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'lecturer_id' => 'required|integer|exists:users,id',
            'semesters' => 'required|string',
            'academic_year' => 'required|string',
            'sks' => 'required|integer',
            'code' => 'required|string',
            'description' => 'required|string',
        ]);

        $subject = new Subject;
        $subject->title = $request->get('title');
        $subject->lecturer_id = $request->get('lecturer_id');
        $subject->semesters = $request->get('semesters');
        $subject->academic_year = $request->get('academic_year');
        $subject->sks = $request->get('sks');
        $subject->code = $request->get('code');
        $subject->description = $request->get('description');
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject created successfully.');
    }

    //show
    public function show($id)
    {
        $subject = \App\Models\Subject::find($id);
        return view('subject.show', compact('subject'));
    }

    //edit
    public function edit($id)
    {
        $subject = \App\Models\Subject::find($id);
        return view('pages.subject.edit', compact('subject'));
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'lecturer_id' => 'required',
            'semesters' => 'required',
            'academic_year' => 'required',
            'sks' => 'required',
            'code' => 'required',
            'description' => 'required',
        ]);

        $subject = \App\Models\Subject::find($id);
        $subject->title = $request->get('title');
        $subject->lecturer_id = $request->get('lecturer_id');
        $subject->semesters = $request->get('semesters');
        $subject->academic_year = $request->get('academic_year');
        $subject->sks = $request->get('sks');
        $subject->code = $request->get('code');
        $subject->description = $request->get('description');
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject has been updated successfully.');
    }

    //destroy
    public function destroy($id)
    {
        $subject = \App\Models\Subject::find($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('success', 'Subject has been deleted successfully.');
    }
}
