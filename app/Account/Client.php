<?php

namespace App\Account;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function user() {
        return $this->belongsTo(\App\User::class);
    }

    public static function boot() {
	    parent::boot();
        static::saving(function ($lead) {
            $lead->full_name = $lead->name . ' ' . $lead->last_name;
        });
    }
}
