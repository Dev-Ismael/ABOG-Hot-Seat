<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Order\Update\OrderUserMail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','desc')->with(['user','plan'])->paginate(10);
        foreach( $orders as $order ){
            $order -> setAttribute( "added_at" , date( 'm-d-Y H:i', strtotime( $order -> created_at) ) );
        }
        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            // Find Record In Db Column
            $order = Order::where('id', $id )->with(['user','plan'])->first();
            $order -> setAttribute( "added_at" , date( 'm-d-Y H:i', strtotime( $order -> created_at) ) );

            if( !$order ){  // If Not Found
                return response()->json([
                    'status' => 'error',
                    'msg'    => '404 not found'
                ]);
            }

            return response()->json([ // If Found Success
                'status' => 'success',
                "msg"    => "order get successfully",
                'data'   => $order
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'msg'    => 'server error'
            ]);
        }
    }

    public function update(Request $request, $id)
    {

        // Find Record In Db Column
        $order = Order::where('id', $id )->with(['user','plan'])->first();

        if( !$order ){  // If Not Found
            return response()->json([
                'status' => 'error',
                'msg'    => '404 not found'
            ]);
        }

        // save all request in on   e variable
        $requestData = $request->all();


        // Store in DB
        try {

            // store row in table
            $update = $order-> update( $requestData );

            // if not save in DB
            if(!$update){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at update opration'
                ]);
            }


            $mail_title = '';

            if( $request->status == '2' ){    // If Order Has Expired
                $mail_title = 'Your ' . $order->plan->title . " Has Expired";
            }else if( $request->status == '3' ){    // If there Payment Issue
                $mail_title = 'Payment Issue At Your Order';
            }

            if( $request->status != "1" ){  // If status not open
                // Order Mail
                $mailData = [
                    'title' => $mail_title,
                    'user'  => $order->user,
                    'order' => $order,
                ];
                // Send To User
                Mail::to($order->user->email)->     //  reciever Mail
                send( new OrderUserMail( $mailData ) );
            }


            // If Found Success
            return response()->json([
                'status' => 'success',
                "msg"    => "Plan updated successfully",
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'server error'
            ]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // Find Record In Db Column
        $order = Order::where('id', $id )->first();

        if( !$order ){  // If Not Found
            return response()->json([
                'status' => 'error',
                'msg'    => '404 not found'
            ]);
        }


        // Delete Record from DB
        try {

            $delete = $order->delete();
            // If Delete Error
            if( !$delete ){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at delete opration'
                ]);
            }

            // If Delete Succesffuly
            return response()->json([
                'status' => 'success',
                'msg'    => 'Order deleted successfully'
            ]);

        } catch (\Exception $e) {

            // If server error
            return response()->json([
                'status' => 'error',
                'msg'    => 'server error'
            ]);

        }

    }

    public function search(Request $request)
    {



        try {


            $userIds = User::where('name', 'like', "%{$request->search}%")->pluck('id')->toArray();
            // return $userId;
            $orders = Order::whereIn('user_id', $userIds)->paginate(10);

            // If Not Delete Record
            if( !$orders ){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at search opration'
                ]);
            }

            return response()->json([ // If Found Success
                'status' => 'success',
                "msg"    => "order get successfully",
                'data'   => $orders
            ]);

        } catch (\Exception $e) {

            // If server error
            return response()->json([
                'status' => 'error',
                'msg'    => 'server error'
            ]);

        }

    }




    public function multiAction(Request $request)
    {


        // If Action is Delete
        if( $request->action == "delete" ){

            $ids = explode(",", $request->id);


            try {
                $delete = Order::destroy( $ids );

                if( !$delete ){
                    return response()->json([
                        'status' => 'error',
                        'msg'    => 'Error at delete opration'
                    ]);
                }

                // If Delete Succesffuly
                return response()->json([
                    'status' => 'success',
                    'msg'    => 'Orders deleted successfully'
                ]);

            } catch (\Exception $e) {

                // If server error
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'server error'
                ]);

            }
        }

    }


}
