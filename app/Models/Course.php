<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Course extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'url',
        'description',
        'image',
        'code',
        'total_hours',
        'published',
        'free',
        'price',
        'price_plots',
        'total_plots',
        'link_buy',
    ];

    public function scopeUserByAuth($query)
    {
        return $query->where('user_id', auth()->user()->id);//Retorna o id do usuario logado
    }

    //Relacionamento do curso com os modulos
    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function user()
    {
        //Um curso pertence a um professor
        return $this->belongsTo(User::class);
    }
}
