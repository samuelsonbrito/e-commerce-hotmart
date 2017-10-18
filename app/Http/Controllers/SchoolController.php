<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
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
        $course = $course->where('url', $url)->get()->first();
        //dd($course);

        $title = "LaraSchool - Curso: {$course->name}";

        return view('school.site.curso', compact('course', 'title'));
    }
}
