<?php

namespace App\Models\Student;

use App\Models\Course\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
