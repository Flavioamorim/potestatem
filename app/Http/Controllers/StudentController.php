<?php

namespace App\Http\Controllers;

use App\Repository\CourseRepository;
use App\Repository\StudentCourseRepository;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;
use Session;

class StudentController extends Controller
{
    /**
     * @var StudentRepository
     */
    private $studentRepository;
    /**
     * @var CourseRepository
     */
    private $courseRepository;
    /**
     * @var StudentCourseRepository
     */
    private $studentCourseRepository;

    /**
     * CoursesController constructor.
     * @param UploadService $uploadService
     */
    public function __construct(
        StudentRepository $StudentRepository,
        CourseRepository $courseRepository,
        StudentCourseRepository $studentCourseRepository
    )
    {
        $this->studentRepository = $StudentRepository;
        $this->courseRepository = $courseRepository;
        $this->studentCourseRepository = $studentCourseRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->studentRepository->getAll();

        return view('student.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = $this->courseRepository->getCoursesSelect();

        return view('student.create')->with('courses', $courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataInsert = [
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
        ];
        try {
            $studentId = $this->studentRepository->insert($dataInsert);
            $this->studentCourseRepository->insert($studentId, $request->courses);
            Session::flash('message-ok', "Registro cadastrado com sucesso.");
        } catch (\Exception $e) {
            Session::flash('message-error', "Erro ao cadastrar registro.");
        }

        return redirect('alunos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->studentRepository->getById($id);
        $courses = $this->courseRepository->getCoursesSelect();
        $coursesSelect = $this->studentCourseRepository->getStudentCoursesSelect($data->id);

        return view('student.edit')
            ->with('courses', $courses)
            ->with('coursesSelect', $coursesSelect)
            ->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataInsert = [
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
        ];

        try {
            $this->studentRepository->insertOrUpdate($dataInsert, $id);
            $this->studentCourseRepository->deleteByStudent($id);
            $this->studentCourseRepository->insert($id, $request->courses);
            Session::flash('message-ok', "Registro cadastrado com sucesso.");
        } catch (\Exception $e) {
            Session::flash('message-error', "Erro ao cadastrar registro.");
        }

        return redirect('alunos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->studentRepository->delete($id);
            Session::flash('message-ok', "Registro deletado com sucesso.");
        } catch (\Exception $e) {
            Session::flash('message-error', "Erro ao cadastrar registro.");
        }

        return redirect('alunos');
    }
}
