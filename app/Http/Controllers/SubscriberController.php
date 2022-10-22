<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UpdateSubscriberRequest;

class SubscriberController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriberRequest $request)
    {

        $requestData = $request->all();

        try {

            // store row in table
            $subscriber = Subscriber::create( $requestData );

            // if not save in DB
            if(!$subscriber){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at store opration'
                ]);
            }

            // If Found Success
            return response()->json([
                'status' => 'success',
                "msg"    => "subscribe done successfully",
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'server error'
            ]);
        }

    }

}
