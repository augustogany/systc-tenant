<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
class Plan extends Model
{
       protected $fillabel = ['active','slug','currency','interval','nickname','amount','meta','currency_id'];
        protected $casts = [ 
         'amount' => 'Float',
        'meta' => 'array' 
        ];

        protected $appends = ['modulos']; 

        public function getModulosAttribute() { 
            return Arr::get($this->meta, 'modulos', []); 
        }
        
       public function getAmountAttribute($value){
           return  ($value)/100;
       }

       public function setAmountAttribute($amount){
            $this->attributes["amount"] = $amount * 100;
       }

        public function moneda() {
            return $this->belongsTo(Currency::class,'currency_id');
        }
}
