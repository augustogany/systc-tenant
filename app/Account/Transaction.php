<?php

namespace App\Account;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function setPriceAttribute($price){
        $this->attributes["price"] = $price * 100;
   }

    public function suscription() {
        return $this->belongsTo(Suscription::class);
    }

    public function payment_type() {
        return $this->belongsTo(PaymentTypes::class, 'payment_type_id');
    }
}
