<?php

namespace App\Account;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function user()
    {
    return $this->belongsTo(Company::class);
    }
    public function payments()
    {
    return $this->hasMany(Payment::class);
    }
}
