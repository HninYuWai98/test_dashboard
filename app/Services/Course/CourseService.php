<?php

namespace App\Services\Course;

use App\Models\Course\Course;
use Exception;
use Illuminate\Support\Facades\DB;


class CourseService
{
    public function getAllCourses()
    {
        $courses = Course::paginate(5);
        return $courses;
    }

    public function storeCourse($data)
    {
        try{
            DB::beginTransaction();

            $course = Course::create($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        }
        return $course;
    }

    public function editCourse($id)
    {
        $course = Course::findOrFail($id);

        return $course;
    }

    public function updateCourse($data, $id)
    {
        try{
            DB::beginTransaction();

            $course = Course::findOrFail($id);

            $course->update($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        }
        return $course;
    }

    public function deleteCourse($id)
    {
        try{
            DB::beginTransaction();

            $course = Course::findOrFail($id);

            $course->delete();

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        }
        return $course;
    }

}
