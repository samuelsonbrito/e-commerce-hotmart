<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Carbon\Carbon;
use App\Models\Sale;

class HotmartController extends Controller
{
    public function access(Request $request)
    {
        $dataForm = $request->all();
        //dd($dataForm);

        //Recupera os dados do curso a ser vendido
        $course = Course::where('code', $dataForm['prod'])->get()->first();
        //dd($course);

        //Recupera o usuario dono do curso
        $user = User::where('token', $dataForm['hottok'])->get()->first();
        //dd($user);

        //Verificando se a pessoa é dona do curso
        if ($course->user_id != $user->id)
            return response()->json(['error' => 'Not permission'], 401);

        //Recuperar o usuario pelo email
        $student = User::where('email', $dataForm['email'])->get()->first();
        //dd($student);

        $date = Carbon::parse($dataForm['purchase_date'])->format('Y-m-d');
        //dd($date);

        //Venda
        $newSale = Sale::create([
            'course_id'     => $course->id,
            'user_id'       => $student->id,
            'transaction'   => $dataForm['transaction'],
            'status'        => $dataForm['status'],
            'date'          => $date,
        ]);

        if ($newSale)
            return response()->json(['success' => 'Success'], 200);
        else
            return response()->json(['error' => 'Fail'], 500);
    }
}
