<?php

namespace App\Repository;

use App\Student;
use Illuminate\Database\Eloquent\Model;

class StudentRepository
{
    /**
     * @var string
     */
    protected $table;

    /**
     * StudentRepository constructor.
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
        return Student::query()->paginate(5);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function getById(int $id)
    {
        return Student::query()->find($id);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool
     */
    public function insertOrUpdate(array $data, $id = null)
    {
        return Student::query()->updateOrInsert([
            'id' => $id,
        ], $data);
    }

    /**
     * @param array $data
     * @param null $id
     * @return bool
     */
    public function insert(array $data)
    {
        $student = new Student();
        $student->name = $data['name'];
        $student->email = $data['email'] ?? null;
        $student->cpf = $data['cpf'] ?? null;
        $student->save();

        return $student->id;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return Student::where('id', '=', $id)->delete();
    }
}
