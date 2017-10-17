<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Lesson;

class LessonController extends Controller
{
    private $lesson;
    private $totalPaginate = 8;

    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    public function byModuleId($idModule)
    {
        //Recupera o modulo pelo id
        $module = Module::find($idModule);
        //dd($module);

        //Recupera as lições referentes a esse módulo
        $lessons = $module->lessons()->paginate($this->totalPaginate);

        //Titulo da página
        $title = "Aulas do módulo: {$module->name}";

        //Envia para a view os itens recuperados
        return view('school.teacher.courses.lessons.lessons', compact('title', 'lessons', 'module'));
    }


    public function create()
    {
        $title = "Cadastrar nova aula";

        //Recebe o modulo atual, e passa para o select de aulas
        $modulo_atual = Request('id');

        $modules = Module::pluck('name', 'id');

        return view('school.teacher.courses.lessons.create-edit', compact('title', 'modules', 'modulo_atual'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $dataForm = $request->all();

        //Verifica e preenche o checkbox caso necessario
        $dataForm['free'] = isset($dataForm['free']);

        $insert = $this->lesson->create($dataForm);

        if ($insert) {
            return redirect()->route('module.lessons', $insert->module_id);
        } else {
            return redirect()->back()->with(['errors' => 'Falha ao cadastrar nova aula!']);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $lesson = $this->lesson->find($id);
        //dd($lesson);

        $title = "Editar aula";

        $modules = Module::pluck('name', 'id');

        //Recebe o modulo atual, e passa para o select de aulas
        $modulo_atual = Request('id');

        return view('school.teacher.courses.lessons.create-edit', compact('lesson', 'title', 'modules', 'modulo_atual'));
    }

    public function update(Request $request, $id)
    {
        $dataForm = $request->all();

        //dd($request->all());
        $lesson = $this->lesson->find($id);

        $dataForm['free'] = isset($dataForm['free']);

        $update = $lesson->update($dataForm);

        if ($update) {
            return redirect()->route('module.lessons', $dataForm['module_id']);
        } else {
            return redirect()->back()->with(['errors' => 'Falha ao atualizar aula!']);
        }
    }

    public function destroy(Request $request, $id)
    {
        $lesson = $this->lesson->find($id);
        //dd($lesson);

        $lesson->delete();

        return redirect()->route('module.lessons', $request->get('module_id'));
    }
}
