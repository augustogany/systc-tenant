<?php

namespace App\Account;
use Laravel\Nova\Actions\Actionable;
use Illuminate\Database\Eloquent\Model;

class Suscription extends Model
{
    use Actionable;
    
    protected $fillable = ['name','precioplan','plan_id','client_id','estado'];

    public function getPrecioPlanAttribute($value){
        return  ($value)/100;
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function plan() {
        return $this->belongsTo(\App\Plan::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
