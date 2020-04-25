<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Plan;

Route::get('/', function () {
    $planes = Plan::with('moneda')->get();
    //return $planes;
    return view('frontend.home', compact('planes'));
});

Auth::routes();
 // Stripe oAuth
//  Route::get('/stripe/oauth', 'StripeOAuthController@oauth')->name('stripe.oauth');
//  Route::get('/stripe/authenticate', 'StripeOAuthController@authenticate')->name('stripe.authenticate');
//  Route::post('/stripe/deactivate', 'StripeOAuthController@deactivate')->name('stripe.deactivate');

/*
* rutas para el crud de form
 */
  // Forms
//   Route::get('/forms', 'FormController@index')->name('forms.index');
//   Route::get('/forms/create', 'FormController@create')->name('forms.create');
//   Route::post('/forms/create', 'FormController@store')->name('forms.store');
//   Route::get('/forms/{uid}', 'FormController@edit')->name('forms.edit');
//   Route::patch('/forms/{form}', 'FormController@update')->name('forms.update');
//   Route::delete('/forms/{uid}', 'FormController@destroy')->name('forms.destroy');

  Route::get('/forms/{uid}/payments', 'FormPaymentsController@index')->name('form.payments.index');
/*
*   Rutas para el modulo de carrito de compras
 */
Route::get('/carrito','Tenant\ShoppingCartController@show')->name('shopping_cart.show');
Route::get('/carrito/productos','Tenant\ShoppingCartController@products')->name('shopping_cart.products');

Route::get('/pagar','Tenant\PaymentsController@pay');
Route::get('/pagar/completar','Tenant\PaymentsController@execute')->name('payments.execute');

Route::resource('products','Tenant\ProductsController');
Route::resource('in_shopping_carts','Tenant\ProductInShoppingCartsController', [
    'only' => ['store','destroy']
]);

/*
*   Rutas para emodulo de compra de planes
 */

 /*
*   Rutas para acceso al panel de administracion de account
 */
Route::get('/dashboard', 'Account\DashboardController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

 /*
*   Rutas para el crud de los clientes de la  empresa
 */

 Route::get('clientes','Account\ClienteController@index');
 Route::get('fetchclients','Account\ClienteController@getclients');
 //ruta para obtener los planes via axios del frontend
 Route::get('selectplanes','Account\ClienteController@selectPlans');
 //obtengo el id del plan en especifico
 Route::get('purchase/{plan}','Account\PlanController@show')->name('purchase_plan');