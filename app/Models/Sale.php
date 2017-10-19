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
}
