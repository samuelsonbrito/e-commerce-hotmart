<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //dd($this->segment(2));

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(2);//Recuperando o id para trabalhar na url

        return [
            'module_id'     =>  'required',
            'name'          =>  'required|min:3|max:100',
            'url'           =>  "required|min:3|max:20|unique:lessons,url,{$id},id",//Trabalhando para não ser necessario atualizar a url em caso de edição da aula
            'description'   =>  'required|min:3|max:255',
            'video'         =>  'required|min:3|max:100',
        ];
    }
}
