<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CourseController extends Controller
{
    /**
     * Instantiate a new CourseController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-course|edit-course|delete-course', ['only' => ['index','show']]);
       $this->middleware('permission:create-course', ['only' => ['create','store']]);
       $this->middleware('permission:edit-course', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-course', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('courses.index', [
            'courses' => course::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request): RedirectResponse
    {
        Course::create($request->all());
        return redirect()->route('courses.index')
                ->withSuccess('New course is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course): View
    {
        return view('courses.show', [
            'course' => $course,
            'students' => Student::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): View
    {
        return view('courses.edit', [
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course): RedirectResponse
    {
        $course->update($request->all());
        return redirect()->back()
                ->withSuccess('Course is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();
        return redirect()->route('courses.index')
                ->withSuccess('Course is deleted successfully.');
    }
}