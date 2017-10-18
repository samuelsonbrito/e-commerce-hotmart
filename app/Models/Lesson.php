<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use \App\User;

class Lesson extends Model
{
    protected $fillable = [
        'module_id',
        'name',
        'url',
        'description',
        'free',
        'video',
    ];

}
