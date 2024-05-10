<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Student\Student;
use App\Http\Controllers\Controller;
use App\Services\Student\StudentService;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(
        StudentService $studentService
    )
    {
        $this->studentService = $studentService;
    }

    public function index()
    {
        $students= $this->studentService->getAllStudents();

        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|min:3|max:20'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/students/', $filename);
            $data['image'] = $filename;
        }

        $student = $this->studentService->storeStudent($data);

        return redirect()->route('students.index')->with('New Student is added successfully');
    }

    public function edit($id)
    {
       $student = $this->studentService->editStudent($id);

       return view('student.edit')->with([
            'student'=>$student
       ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|min:3|max:20'
        ]);

        $student = Student::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/students/', $filename);
            $data['image'] = $filename;
        } else {
            $data['image'] = $student->image;
        }

        $student = $this->studentService->updateStudent($data, $id);

        return redirect()->route('students.index')->withSuccess('Student is updated successfully.');
    }

    public function destroy($id)
    {
        $employee = $this->studentService->deleteStudent($id);

        return redirect()->route('students.index')->withSuccess('Student removed successfully.');
    }
}
