<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateProfileUserRequest;
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

    public function registring(RegisterUserRequest $request)
    {
        //Recupera todos os dados do formulario
        $dataForm = $request->all();

        //Criptografa a senha
        $password = $dataForm['password'];
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
        } else {
            //Deleta a posição da imagem
            unset($dataForm['image']);
        }

        //Cadastra o usuario
        $insert = $this->user->create($dataForm);

        //Verifica se cadastrou com sucesso
        if ($insert)
            if (Auth::attempt(['email' => $dataForm['email'], 'password' => $password]))
                return redirect()->route('profile');
            else
                return redirect('/login');
        else
            return redirect()
                ->back()
                ->with(['errors' => 'Falha ao cadastrar!']);
    }

    public function profile()
    {
        $title = 'Meu Perfil';

        return view('school.user.profile', compact('title'));
    }

    public function profileUpdate(UpdateProfileUserRequest $request)
    {
        $dataForm = $request->all();

        $user = $this->user->find(auth()->user()->id);

        if ($dataForm['password'] != '')
            $dataForm['password'] = bcrypt($dataForm['password']);
        else
            unset($dataForm['password']);

        if ($request->hasFile('image')) {
            //dd($nameImage = $user->image);

            $image = $request->file('image');

            if ($user->image != null)
                $nameImage = $user->image;
            else
                $nameImage = uniqid(date('YmdHis')) . '.' . $image->getClientOriginalExtension();

            $dataForm['image'] = $nameImage;

            $upload = $image->storeAs('users', $nameImage);

            if (!$upload)
                return redirect()
                    ->back()
                    ->with(['errors' => 'Falha no upload da imagem!']);
        }

        $update = $user->update($dataForm);

        //Verifica se atualizou com sucesso
        if ($update)
            return redirect()
                ->back()
                ->with(['success' => 'Perfil atualizado com sucesso!']);
        else
            return redirect()
                ->back()
                ->with(['errors' => 'Falha ao editar!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route('home');
    }
}
