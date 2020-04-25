<?php

namespace App\Account;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function forms()
    {
    return $this->hasMany(Form::class);
    }
}
