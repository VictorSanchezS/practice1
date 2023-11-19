<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    /**
     * Instantiate a new StudentController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-student|edit-student|delete-student', ['only' => ['index','show']]);
       $this->middleware('permission:create-student', ['only' => ['create','store']]);
       $this->middleware('permission:edit-student', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-student', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('students.index', [
            'students' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create',[
            'courses' => Course::latest()->paginate(3)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        //Student::create($request->all());
        $student = new student();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course_id = $request->input('course');
        
        $student->save();

        return redirect()->route('students.index')
                ->withSuccess('New student is added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        return view('students.show', [
            'student' => $student,
            'courses' => Course::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        // return view('students.edit', [
        //     'student' => $student
        // ]);

        $student = Student::find($id);
        return view('students.edit',['student' => $student, 'courses' => Course::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|unique:students,email, ' . $student->id,
        ]);
        
        //$student->update($request->all());

        $student = Student::find($student->id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course_id = $request->input('course');
        
        $student->save();
        return redirect()->back()
                ->withSuccess('Student is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();
        return redirect()->route('students.index')
                ->withSuccess('student is deleted successfully.');
    }
}