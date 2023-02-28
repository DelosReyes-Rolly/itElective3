<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectTeachers extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'course_id',
        'subject_id',
        'semester_id',
        'schoolyear_id',
        'time_from',
        'time_to',
        'days_of_week',
    ];


    protected $guarded = [];
}
