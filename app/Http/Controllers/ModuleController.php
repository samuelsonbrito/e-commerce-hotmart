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

    public function byCourseId($idCourse)
    {
        $course = Course::find($idCourse);
        //dd($course);

        $modules = $course->modules()->paginate($this->totalPaginate);

        $title = "Módulos do curso: {$course->name}";

        return view('school.teacher.courses.modules', compact('title', 'course', 'modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::UserByAuth()->pluck('name', 'id');//Retorna os cursos referentes ao usuario logado

        $curso_atual = Request('id');//Recebendo o id do curso atual

        $title = "Cadastrar Novo Módulo";

        return view('school.teacher.courses.module-create', compact('title', 'courses', 'curso_atual'));//envia o id do curso atual para a view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $dataForm = $request->all();

        $insert = $this->module->create($dataForm);

        if ($insert)
            return redirect()->route('course-modules', $insert->course_id);
        else
            return redirect()->back()->with(['errors' => 'Falha ao cadastrar novo módulo!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
