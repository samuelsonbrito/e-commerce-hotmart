<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $timestamps = false;

    //Função para trazer todos os cursos do usuario logado no momento
    public function myCourses($totalPage)
    {
        return $this->join('courses', 'courses.id', '=', 'sales.course_id')
            ->select('sales.id', 'courses.name', 'courses.image', 'courses.url', 'courses.description')
            ->where('sales.user_id', auth()->user()->id)
            ->paginate($totalPage);

        /*
         * Join com a tabela de cursos, aonde o id do curso seja igual ao curso_id da tabela de vendas
         * Select para trazer os campos desejados
         * Where os cursos sejam pertencentes ao usuario logado no momento
         * Get retorna os dados
         */
    }

    //Trazer os cursos da pessoa logada no momento
    public function mySales()
    {
        return $this->join('courses', 'courses.id', '=', 'sales.course_id')
            ->join('users', 'users.id', '=', 'sales.user_id')
            ->select('sales.transaction', 'sales.date', 'courses.name as course_name', 'courses.url', 'courses.image', 'courses.name', 'users.name as user_name', 'users.bibliography as user_bibliography', 'users.image as user_image')
            ->where('courses.user_id', auth()->user()->id)
            ->get();
        /*
         * This - trabalha com a propria model de vendas
         * Join na tabela de cursos onde o id do curso seja igual ao course_id da tabela vendas
         * Join na tabela usuarios onde o id do usuario seja igual ao user_id das vendas
         * Select nos campos desejados
         * Where as vendas pertencentes ao usuario logado
         * Get
         */
    }

    //Trazer os alunos da pessoa logada no momento
    public function myStudents()
    {
        return $this->mySales();
    }
}
