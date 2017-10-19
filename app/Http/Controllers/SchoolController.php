<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    private $totalPage = 8;

    public function index(Course $course, Category $category)
    {
        $categories = $category->pluck('name', 'id');
        //dd($categories);

        $courses = $course
            ->where('published', true)
            ->orderBy('id', 'DESC')
            ->paginate($this->totalPage);
        //dd($courses);

        $title = "LaraSchool - A sua plataforma ead!";

        return view('school.home.index', compact('courses', 'title', 'categories'));
    }

    public function search(Request $request, Course $course, Category $category)
    {
        $dataForm = $request->except('_token');
        //dd($dataForm);

        $courses = $course
            ->where('published', true)
            ->where('category_id', $dataForm['category'])
            ->orderBy('id', 'DESC')
            ->paginate($this->totalPage);
        //dd($courses);

        $categories = $category->pluck('name', 'id');
        //dd($categories);

        $title = "LaraSchool - A sua plataforma ead!";

        return view('school.home.index', compact('courses', 'title', 'categories'));
    }

    public function course($url, Course $course)
    {
        //Recuperando o curso pela sua url
        $course = $course
            ->where('url', $url)
            ->get()
            ->first();
        //dd($course);

        //Recupera os módulos do curso, já com as lições desse mesmo módulo
        $modules = $course->modules()
            ->with('lessons')
            ->get();
        //dd($modules);

        $title = "LaraSchool - Curso: {$course->name}";

        return view('school.site.curso', compact('course', 'title', 'modules'));
    }

    public function lesson(Lesson $lesson, $url)
    {
        //Recuperando a lição pelo nome
        //$lesson = $lesson->where('url', $url)->get()->first();
        //dd($lesson);

        $lesson = Lesson::join('modules', 'modules.id', '=', 'lessons.module_id')
            ->join('courses', 'courses.id', '=', 'modules.course_id')
            ->join('users', 'users.id', '=', 'courses.user_id')
            ->where('lessons.url', $url)
            ->select('lessons.name', 'lessons.description', 'lessons.url', 'lessons.video', 'lessons.free', 'courses.name as course', 'courses.url as course_url', 'courses.free as course_free', 'modules.id as module_id', 'modules.name as module', 'users.name as user_name', 'users.bibliography', 'users.image as user_image')
            ->get()
            ->first();
        //dd($lesson);

        $title = "Aula {$lesson->name}";

        return view('school.site.lesson', compact('lesson', 'title'));
    }

    public function myCourses(Sale $sale)
    {
        //Recuperando os cursos do usuario logado
        $sales = $sale->myCourses($this->totalPage);
        //dd($sales);

        $title = "Minhas compras - LaraSchool";

        return view('school.site.my-courses', compact('sales', 'title'));

    }
}
