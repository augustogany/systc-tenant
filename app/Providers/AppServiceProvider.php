<?php

namespace App\Providers;

use App\Observers\SuscriptionObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\ShoppingCart;
use App\Account\Suscription;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      //  \URL::forceScheme('https');
       // Refresh currency exchange rates every 100000 seconds (~27.8 hours)
       cache()->remember('currency_rates', 100000, function () {
        $reverse_rates = [];
        $client = new \GuzzleHttp\Client();
        $result = $client->request('GET', 'http://apilayer.net/api/live', [
            'query' => [
                'access_key' => config('currencylayer.api'),
                'source' => 'usd',
                'currencies' => implode(',', config('app.currencies')),
                'format' => 1
            ]
        ]);
        $result = json_decode($result->getBody()->getContents(), true);
        if(!array_key_exists('error', $result)){
            $rates = $result['quotes'];
            // reverse rates
            foreach ($rates as $pair => $rate) {
                $pair = strtolower(substr($pair, 3));
                $reverse_rates[$pair] = 1 / $rate;
            }
        }
        return $reverse_rates;
    });

         View::composer('*', function($view){
        $sessionName = 'shopping_cart_id';
        // session($sessionName);
         $shopping_cart_id = \Session::get($sessionName);
         $shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);
         \Session::put($sessionName, $shopping_cart->id);

         $view->with('productsCount',$shopping_cart->productsCount());
         });

         Suscription::observe(SuscriptionObserver::class);
    }
}
