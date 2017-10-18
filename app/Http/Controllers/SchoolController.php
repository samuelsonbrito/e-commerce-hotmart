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

        $courses = $course
            ->where('published', true)
            ->orderBy('id', 'DESC')
            ->paginate($this->totalPage);
        //dd($courses);

        $title = "LaraSchool - A sua plataforma ead!";

        return view('school.home.index', compact('courses', 'title', 'categories'));
    }
}
