<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Course\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(
        CourseService $courseService
    )
    {
        $this->courseService = $courseService;
    }

    public function index()
    {
        $courses = $this->courseService->getAllCourses();

        return view('course.index')->with(['courses'=>$courses]);
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

        $course = $this->courseService->storeCourse($data);

        return redirect()->route('courses.index')->withSuccess('Course added successfully.');
    }

    public function edit($id)
    {
        $course = $this->courseService->editCourse($id);

        return view('course.edit')->with(['course'=>$course]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string'
        ]);

       $course = $this->courseService->updateCourse($data, $id);

       return redirect()->route('courses.index')->withSuccess('Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = $this->courseService->deleteCourse($id);

        return redirect()->route('courses.index')->withSuccess('Course removed successfully.');
    }
}
