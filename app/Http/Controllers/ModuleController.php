<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleStoreUpdateRequest;
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

    public function create()
    {
        $courses = Course::UserByAuth()->pluck('name', 'id');//Retorna os cursos referentes ao usuario logado

        $curso_atual = Request('id');//Recebendo o id do curso atual

        $title = "Cadastrar Novo Módulo";

        return view('school.teacher.courses.module-create', compact('title', 'courses', 'curso_atual'));//envia o id do curso atual para a view
    }

    public function store(ModuleStoreUpdateRequest $request)
    {
        //dd($request->all());
        $dataForm = $request->all();

        $insert = $this->module->create($dataForm);

        if ($insert)
            return redirect()
                ->route('course.modules', $insert->course_id);
        else
            return redirect()
                ->back()
                ->with('error', 'Falha ao cadastrar novo módulo!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $courses = Course::UserByAuth()->pluck('name', 'id');//Retorna os cursos referentes ao usuario logado

        $module = $this->module->find($id);
        //dd($module);

        //Recebendo o id do curso atual e passa para o select
        $curso_atual = Request('id');

        $title = "Editar módulo: {$module->name}";

        return view('school.teacher.courses.module-edit', compact('module', 'title', 'courses', 'curso_atual'));
    }

    public function update(ModuleStoreUpdateRequest $request, $id)
    {
        $module = $this->module->find($id);

        $dataForm = $request->all();

        $update = $module->update($dataForm);

        if ($update)
            return redirect()
                ->route('course.modules', $dataForm['course_id']);
        else
            return redirect()
                ->back()
                ->with('errors', 'Falha ao atualizar módulo!');
    }

    public function destroy(Request $request, $id)
    {
        $curso = $request->get('course_id');
        //dd($curso);

        $module = $this->module->find($id);

        //verificando se há aulas nesse módulo
        $lessons = $module->lessons()->count();

        //Se existir aulas nesse módulo não vai deletar
        //Deletar as aulas primeiro
        if ($lessons == 0) {

            $module->delete();
            return redirect()
                ->route('course.modules', $curso)
                ->with('success', 'Módulo deletado com sucesso!');
        }
        return redirect()
            ->back()
            ->with('error', 'Delete as aulas do módulo primeiramente!');
    }
}
