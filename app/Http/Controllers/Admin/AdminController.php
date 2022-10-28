<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Messege;
use App\Models\Newsletter;
use App\Models\user;
use App\Models\Subscriber;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Plan;

class AdminController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.admin');
    }

    public function statistics()
    {
        $users       = User::count();
        $messeges    = Messege::count();
        $plans       = Plan::count();
        $orders       = Order::count();

        return response()->json([
            "users"       => $users ,
            "messeges"    => $messeges ,
            "plans" => $plans ,
            "orders" => $orders ,
        ]);

    }

    public function getAuthInfo()
    {

        $admin = Admin::get()->first();
        return response()->json([
            "user" => $admin,
        ]);

    }
}
