<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stancl\Tenancy\Tenant;

class ClienteController extends Controller
{
    public function index() {
       
       return view('account.clientes.index');
    }

    public function getclients(){
       return  tenancy()->all();
    }
    
    public function getclientsapi(){
      return response()->json([
         'tenant' => tenancy()->all(),
         'planes' => \App\Plan::all(['id','nickname','interval'])
      ]);
   }

    public function selectPlans(Request $request) {
       //if (!$request->ajax()) return redirect('/');
       $filtro = $request->filtro;
       $planes = \App\Plan::where('slug','like','%' . $filtro . '%')
                                          ->orWhere('nickname', 'like', '%'. $filtro . '%')
                                          ->orWhere('interval', 'like', '%'. $filtro . '%')
                                          ->orderBy('id', 'asc')->get();
       return ['planes' => $planes];
    }
}
