<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use App\Traits\SEOTrait;
use App\Models\SeoManagement;
use App\Models\Plan;
use App\Models\Setting;

class HomeController extends Controller
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
    public function home(Request $request)
    {
        
        // Find Record In Db Column
        $settings = Setting::where('id', 1 )->first();
        $plans = Plan::get();
        // return $plans;
        return view('home' , compact('plans','settings'));

    }


}
