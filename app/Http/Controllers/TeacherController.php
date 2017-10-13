<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;

class TeacherController extends Controller
{
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

        $insert = $course->create($dataForm);

        if ($insert)
            redirect()->route('home')->with('success', 'Novo curso cadastrado com sucesso!');
        else
            redirect()->back()->with(['errors' => 'Falha ao cadastrar novo curso!']);


    }

    public function courses(Course $course)
    {
        $title = 'Instrutor: Meus cursos';
        $cursos = $course->where('user_id', auth()->user()->id)->paginate(8);

        return view('school.teacher.courses', compact('cursos', 'title'));
    }

}
