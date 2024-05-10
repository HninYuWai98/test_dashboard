<?php

namespace App\Services\Student;

use Exception;
use App\Models\Student\Student;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentService
{
    public function getAllStudents()
    {
        $students = Student::paginate(5);

        return $students;

    }

    public function storeStudent($data)
    {
        try{

            DB::beginTransaction();

            $student = Student::create($data);

            DB::commit();
        }catch(Exception $exception){
            DB::rollback();
        }
        return $student;

    }

    public function editStudent($id)
    {
        $student = Student::findOrFail($id);

        return $student;
    }

    public function updateStudent($data, $id)
    {
        try{
            DB::beginTransaction();

            $student = Student::findOrFail($id);

            $student->update($data);

            DB::commit();

        }catch(Exception $exception){

            DB::rollBack();
        }
        return $student;
    }

    public function deleteStudent($id)
    {
        try{
            DB::beginTransaction();

            $student = Student::findOrFail($id);

            $student->delete();

            DB::commit();

        }catch(Exception $exception){

            DB::rollBack();
        }
        return $student;
    }

}
