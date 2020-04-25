<?php

use Illuminate\Database\Seeder;
use App\Plan;
class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $planes = [
            [
                'active'=>1,
                'slug'=>'basico',
                'currency' => 'usd',
                'interval' => 'month',
                'nickname' => 'Plan Basico',
                'amount' => 5,
                'meta' => [
                    'support' => 'Soporte las 24/7',
                    'sub_domain' => 'Subdominio incluido',
                    'bd' => 'Base de datos separada',
                    'modulos' => []
                ],
                'currency_id' => 1
            ],
            [
                'active'=>1,
                'slug'=>'medio',
                'currency' => 'usd',
                'interval' => 'month',
                'nickname' => 'Plan Medio',
                'amount' => 10,
                'meta' => [
                    'support' => 'Soporte las 24/7',
                    'sub_domain' => 'Subdominio incluido',
                    'bd' => 'Base de datos separada',
                    'modulos' => [
                        'Modulo Control de Gastos',
                        'Modulo de Fidelizacion',
                    ]
                ],
                'currency_id' => 1
            ],
            [
                'active'=>1,
                'slug'=>'avanzado',
                'currency' => 'usd',
                'interval' => 'month',
                'nickname' => 'Plan Avanzado',
                'amount' => 20,
                'meta' => [
                    'support' => 'Soporte las 24/7',
                    'bd' => 'Base de datos separada',
                    'sub_domain' => 'Subdominio incluido',
                    'modulos' => [
                        'Modulo Control de Gastos',
                        'Modulo de Inventario',
                        'Modulo Venta',
                        'Modulo de Fidelizacion',
                    ]
                ],
                'currency_id' => 1
            ],
        ];

        foreach ($planes as $plan) {
            Plan::create($plan);
         }
    }
}
