<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = auth()->user()->id;

        return [
            'name'                  => 'required|min:3|max:100',
            'url'                   => "required|min:3|max:20|unique:users,url,{$id},id",
            'email'                 => "required|min:3|max:100|email|unique:users,email,{$id},id",//Validando o email com unico
            'password'              => 'required|min:6|max:15|confirmed',
            'password_confirmation' => 'required|same:password',
            'image'                 => 'image',
            'token'                 => 'max:250',
            'bibliography'          => 'max:1000',
        ];
    }
}
