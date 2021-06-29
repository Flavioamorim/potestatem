<?php

namespace App\Http\Controllers;

use App\StudentCourse;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    /**
     * @var StudentCourse
     */
    private $studentCourse;

    public function __construct(StudentCourse $studentCourse)
    {
        $this->studentCourse = $studentCourse;
    }

    public function index()
    {
        $data = $this->studentCourse->getCoursesWithMoreStudentes();

        return view('report.index')->with('data', $data);
    }
}
