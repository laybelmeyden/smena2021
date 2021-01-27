<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Form extends Model
{
    protected $fillable = [
    'email',
    'name',
    'date',
    'birthplace',
    'address',
    'place',
    'exp',
    'wins',
    'letter',
    'tel',
    'app',
    ];

    public function withUsers() { 
        return $this->hasOne('App\User'); 
    }
}
