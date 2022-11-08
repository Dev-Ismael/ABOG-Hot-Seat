<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Messege;
use App\Models\User;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAdminInfoRequest;

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
        $orders      = Order::count();

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
            "admin" => $admin,
        ]);

    }





    public function updateAdminInfo( UpdateAdminInfoRequest $request)
    {


        $admin = Admin::get()->first();

        // save all request in one variable
        $requestData = $request->all();

        // Hash Password
        if( !isset( $requestData['password'] ) || $requestData['password'] == '' ){
                $requestData['password'] = $admin->password;
        }else{
            $requestData['password'] = Hash::make($request->password);
        }

        // Update in DB
        try {
            // store row in table
            $update = $admin-> update( $requestData );

            // if not save in DB
            if(!$update){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at update opration'
                ]);
            }

            // If update Success
            return response()->json([
                'status' => 'success',
                "msg"    => "Info update successfully",
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'server error'
            ]);
        }
    }

}
