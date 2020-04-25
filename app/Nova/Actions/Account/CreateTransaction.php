<?php

namespace App\Nova\Actions\Account;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\ActionFields;
use App\Account\Transaction;

class CreateTransaction extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public $name = 'Crear Transaccion';

    public function handle(ActionFields $fields, Collection $models)
    { 
        foreach ($models as $model) {
                //creamos el registro de la transaccion;
                $transaccion = new Transaction;
                $transaccion->price = $model->precioplan;
                $transaccion->suscription_id = $model->id;
                $transaccion->payment_type_id = $fields->pago;
                $transaccion->save();

                //actualizamos el estado de la suscripcion
                $model->estado ="finalizado"; 
                $model->save();
        }
        return Action::message('Transaccion Creada con exito');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
             Select::make('Pago')
            ->options(\App\Account\PaymentTypes::pluck('name','id'))
        ];
    }
}
