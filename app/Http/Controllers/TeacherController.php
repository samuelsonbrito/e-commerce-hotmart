<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class TeacherController extends Controller
{
    public function createCourse(Category $category)
    {

        $categories = $category->pluck('name', 'id');
        $title = 'Cadastrar Novo Curso';

        return view('school.teacher.store-course', compact('categories', 'title'));
    }

}
