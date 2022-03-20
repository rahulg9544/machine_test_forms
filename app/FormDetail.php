<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormDetail extends Model
{
    public function option_details()
    {
        return $this->hasMany('App\Option');
    }

}
