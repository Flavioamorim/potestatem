<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class StudentCourse extends Model
{
    public function getCoursesWithMoreStudentes()
    {
        return StudentCourse::query()
            ->join('students', 'students.id', '=', 'student_courses.student_id')
            ->join('courses', 'courses.id', '=', 'student_courses.course_id')
            ->select('courses.name', DB::raw('count(*) as mat'))
            ->havingRaw('count(*) > ?', [10])
            ->groupBy('courses.name')
            ->get();
    }
}
