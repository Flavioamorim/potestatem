<?php

namespace App\Repository;

use App\StudentCourse;

class StudentCourseRepository
{
    public function insert(int $studentId, $courses)
    {
        if (empty($courses)) {
            return;
        }
        foreach ($courses as $index => $course) {
            $dataInsert = [
                'student_id' => $studentId,
                'course_id' => $course,
            ];

            StudentCourse::query()->insert($dataInsert);
        }
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        return StudentCourse::query()->paginate(5);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function getById(int $id)
    {
        return StudentCourse::query()->find($id);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function insertOrUpdate(array $data, $id = null)
    {
        return StudentCourse::query()->updateOrInsert([
            'id' => $id,
        ], $data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return StudentCourse::where('id', '=', $id)->delete();
    }

    /**
     * @param $studentId
     * @return array
     */
    public function getStudentCoursesSelect($studentId)
    {
        $data = StudentCourse::query()->where('student_id', $studentId)->get();
        $coursesSelect = [];
        foreach ($data as $index => $item) {
            $coursesSelect[$item->course_id] = $item->course_id;
        }

        return $coursesSelect;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteByStudent(int $id)
    {
        return StudentCourse::where('student_id', '=', $id)->delete();
    }
}
