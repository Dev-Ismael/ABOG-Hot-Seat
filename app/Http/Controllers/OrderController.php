<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index( $slug )
    {

        // Find Record In Db Column
        $plan = Plan::where('slug', $slug )->first();

        if(!$plan){
            return redirect()->route("home");
        }

        return view('order', compact("plan") );

    }


    public function proceed( StoreOrderRequest $request , $slug  )
    {

        $user = Auth::user();
        $plan = Plan::where('slug', $slug )->first();



        // Store in DB
        try {

            // store row in table
            $order = Order::create([
                'user_id' => $user->id ,
                'plan_id' => $plan->id ,
                'payment_method'   => $request->payment_method
            ]);

            // if not save in DB
            if(!$order){
                return abort(500, 'Whatever you were looking for, look somewhere else');
            }

            return view('submission', [
                'messege' => 'Purchase completed, Go to your profile and book sessions Now!',
                'link' => 'profile'
            ]);

        } catch (\Exception $e) {
            return abort(500, 'Whatever you were looking for, look somewhere else');
        }

    }

}
