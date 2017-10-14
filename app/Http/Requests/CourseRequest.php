<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //dd($this->segment('2'));//Pega os parametros da url na ordem
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment('2');

        return [
            'category_id'   => 'required',
            'name'          => 'required|min:3|max:150',
            'url'           => "required|min:3|max:150|unique:courses,url,{$id},id",
            'description'   => 'required|min:3|max:2000',
            'image'         => 'image',
            'code'          => "required|min:2|max:250|unique:courses|integer,code,{$id},id",
            'total_hours'   => 'required',
            'price'         => 'required',
            'price_plots'   => 'required',
            'total_plots'   => 'required|integer',
            'link_buy'      => 'required|max:255',
        ];
    }
}
