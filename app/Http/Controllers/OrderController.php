<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Plan;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {

        // Find Record In Db Column
        $plan = Plan::where('slug', $slug )->first();
        
        if(!$plan){
            return redirect()->route("home");
        }

        return view('order', compact("plan") );

    }

}
