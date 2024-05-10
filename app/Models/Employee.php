<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'type_id','image'];

    protected $with = ['type'];

    public function type()
    {
        return $this->belongsTo(EmployeeType::class);
    }
}
