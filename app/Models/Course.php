<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    //Relacionamento do curso com os modulos
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
