<?php

namespace App\Repository;

use App\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CourseRepository
{
    /**
     * @var string
     */
    protected $table;

    /**
     * CourseRepository constructor.
     */
    public function __construct()
    {
        $this->table = 'courses';
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        return Course::query()->paginate(5);
    }

    /**
     * @return array
     */
    public function getCoursesSelect()
    {
        $data = $this->getAll();
        $dataSelect = [];
        foreach ($data as $index => $datum) {
            $dataSelect[$datum->id] = $datum->name;
        }

        return $dataSelect;
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function getById(int $id)
    {
        return Course::query()->find($id);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function insertOrUpdate(array $data, $id = null)
    {
        return Course::query()->updateOrInsert([
            'id' => $id,
        ], $data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return Course::where('id', '=', $id)->delete();
    }
}
