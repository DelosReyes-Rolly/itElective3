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

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function semester(){
        return $this->belongsTo(Semesters::class);
    }

    public function course(){
        return $this->belongsTo(Courses::class);
    }

    public function subject(){
        return $this->belongsTo(Subjects::class);
    }

    public function schoolyear(){
        return $this->belongsTo(SchoolYears::class);
    }
}
