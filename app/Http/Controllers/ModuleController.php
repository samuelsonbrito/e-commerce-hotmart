<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Module;

class ModuleController extends Controller
{
    private $module;
    private $totalPaginate = 20;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }


    //Exibir módulos do curso
    public function index($idCourse)
    {
        $course = Course::find($idCourse);
        //dd($course->modules()->get());
        $modules = $course->modules()->paginate($this->totalPaginate);//Retorna todos os módulos do curso

        $title = "Módulos Curso: {$course->name}";

        return view('school.teacher.courses.modules', compact('course', 'modules', 'title'));

    }
}
