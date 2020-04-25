<?php

namespace App\Observers;

use App\Account\Suscription;
use App\Plan;
class SuscriptionObserver
{
    /**
     * Handle the suscription "created" event.
     *
     * @param  \App\Suscription  $suscription
     * @return void
     */
    
    public function creating(Suscription $suscription)
    {   $plan = Plan::find($suscription->plan_id);
        $suscription->name = $plan->nickname;
        $suscription->precioplan = $plan->amount * 100;
        $suscription->estado = 'pendiente';
    }

    public function created(Suscription $suscription)
    {
        //
    }

    /**
     * Handle the suscription "updated" event.
     *
     * @param  \App\Suscription  $suscription
     * @return void
     */
    public function updated(Suscription $suscription)
    {
        //
    }

    /**
     * Handle the suscription "deleted" event.
     *
     * @param  \App\Suscription  $suscription
     * @return void
     */
    public function deleted(Suscription $suscription)
    {
        //
    }

    /**
     * Handle the suscription "restored" event.
     *
     * @param  \App\Suscription  $suscription
     * @return void
     */
    public function restored(Suscription $suscription)
    {
        //
    }

    /**
     * Handle the suscription "force deleted" event.
     *
     * @param  \App\Suscription  $suscription
     * @return void
     */
    public function forceDeleted(Suscription $suscription)
    {
        //
    }
}
