<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register()
    {
        return view('school.user.register');
    }

    public function registring(Request $request)
    {
        //Recupera todos os dados do formulario
        $dataForm = $request->all();

        //Criptografa a senha
        $dataForm['password'] = bcrypt($dataForm['password']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $nameImage = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();

            $dataForm['image'] = $nameImage;

            $upload = $image->storeAs('users', $nameImage);

            if (!$upload)
                return redirect()
                    ->back()
                    ->with(['errors' => 'Falha no upload da imagem!']);
        }

        //Cadastrar o usuario
        $insert = $this->user->create($dataForm);

        //Verifica se cadastrou com sucesso
        if ($insert)
            return redirect()
                ->route('home');
        else
            return redirect()
                ->back()
                ->with(['errors' => 'Falha ao cadastrar!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route('home');
    }
}
