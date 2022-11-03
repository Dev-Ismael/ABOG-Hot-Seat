<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use App\Traits\SEOTrait;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use SEOTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $settings = Setting::where('id', 1 )->first();
        $orders = Order::where('user_id', Auth::user()->id )->get();
        return view('profile' , compact("orders","settings"));
    }


}
