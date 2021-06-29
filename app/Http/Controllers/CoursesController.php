<?php

namespace App\Http\Controllers;

use App\Repository\CourseRepository;
use App\Support\UploadService;
use Illuminate\Http\Request;
use Session;

class CoursesController extends Controller
{
    /**
     * @var UploadService
     */
    private $uploadService;
    /**
     * @var CourseRepository
     */
    private $courseRepository;

    /**
     * CoursesController constructor.
     * @param UploadService $uploadService
     */
    public function __construct(
        UploadService $uploadService,
        CourseRepository $courseRepository
    ) {
        $this->uploadService = $uploadService;
        $this->courseRepository = $courseRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->courseRepository->getAll();

        return view('courses.index')->with('courses', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $this->uploadService->uploadFile($request->arquivo, md5(microtime()));
        $dataInsert = [
            'name' => $request->name,
            'content_program' => $request->content_program,
            'file' => $file,
        ];

        try {
            $this->courseRepository->insertOrUpdate($dataInsert);
            Session::flash('message-ok', "Registro cadastrado com sucesso.");
        } catch (\Exception $e) {
            Session::flash('message-error', "Erro ao cadastrar registro.");
        }

        return redirect('cursos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->courseRepository->getById($id);

        return view('courses.edit')->with('course', $data);
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
            'content_program' => $request->content_program,
        ];
        if (isset($request->arquivo)) {
            $file = $this->uploadService->uploadFile($request->arquivo, md5(microtime()));
            $dataInsert['file'] = $file;
        }

        try {
            $this->courseRepository->insertOrUpdate($dataInsert, $id);
            Session::flash('message-ok', "Registro cadastrado com sucesso.");
        } catch (\Exception $e) {
            Session::flash('message-error', "Erro ao cadastrar registro.");
        }

        return redirect('cursos');
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
            $this->courseRepository->delete($id);
            Session::flash('message-ok', "Registro deletado com sucesso.");
        } catch (\Exception $e) {
            Session::flash('message-error', "Erro ao cadastrar registro.");
        }

        return redirect('cursos');
    }
}
