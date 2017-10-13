<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;

class TeacherController extends Controller
{
    private $course;
    private $totalPage = 1;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }


    public function createCourse(Category $category)
    {

        $categories = $category->pluck('name', 'id');
        $title = 'Cadastrar Novo Curso';

        return view('school.teacher.store-course', compact('categories', 'title'));
    }

    public function storeCourse(Request $request, Course $course)
    {
        $dataForm = $request->all();

        //dd($dataForm);

        $dataForm['published'] = isset($dataForm['published']);
        $dataForm['free'] = isset($dataForm['free']);

        //Lógica para inserir a imagem
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $nameImage = $dataForm['url'] . '.' . $image->getClientOriginalExtension();

            $dataForm['image'] = $nameImage;

            $upload = $image->storeAs('courses', $nameImage);

            if (!$upload)
                return redirect()->back()->with(['errors' => 'Falha no upload da imagem!']);
        }

        //Reccebendo o id do usuario logado para enviar para o banco
        $dataForm['user_id'] = auth()->user()->id;

        $insert = $this->course->create($dataForm);

        if ($insert)
            return redirect()->route('teacher.courses')->with('success', 'Novo curso cadastrado com sucesso!');
        else
            return redirect()->back()->with(['errors' => 'Falha ao cadastrar novo curso!']);


    }

    public function courses()
    {
        $title = 'Instrutor: Meus cursos';
        $cursos = $this->course->where('user_id', auth()->user()->id)->paginate($this->totalPage);

        return view('school.teacher.courses', compact('cursos', 'title'));
    }

    public function courseSearch(Request $request)
    {
        $dataForm = $request->except('_token');
        $keySearch = $dataForm['key-search'];

        $title = "Instrutor: Meus cursos";

        $cursos = $this->course
            ->where('user_id', auth()->user()->id)
            ->where('name', 'LIKE', "%{$keySearch}%")
            ->paginate($this->totalPage);

        return view('school.teacher.courses', compact('cursos', 'title', 'dataForm'));
    }

}
