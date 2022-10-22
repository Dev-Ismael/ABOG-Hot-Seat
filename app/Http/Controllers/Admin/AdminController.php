<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Messege;
use App\Models\Newsletter;
use App\Models\Service;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('admin');


    }

    public function statistics()
    {
        $services    = Service::count();
        $messeges    = Messege::count();
        $subscribers = Subscriber::count();
        $newsletter  = Newsletter::count();


        return response()->json([
            "services"    => $services ,
            "messeges"    => $messeges ,
            "subscribers" => $subscribers ,
            "newsletter"  => $newsletter ,
        ]);

    }

    public function getAuthInfo()
    {

        $user = User::get()->first();
        return response()->json([
            "user" => $user,
        ]);

    }
}
