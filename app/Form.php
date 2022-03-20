<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Form extends Model
{
    public function form_details()
    {
        return $this->hasMany('App\FormDetail');
    }
   
}
