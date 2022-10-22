<?php

namespace App\Http\Controllers;

use App\Models\Messege;
use App\Http\Requests\StoreMessegeRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessegeController extends Controller
{


    CONST RECIVER_MAIL   = 'sales@bluskyint.com' ;
    CONST MAIL_SUBJECT   = 'A new contact submition at bluskyint.com' ;


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessegeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessegeRequest $request)
    {

        $requestData = $request->all();

        try {

            // store row in table
            $messege = Messege::create( $requestData );

            // if not save in DB
            if(!$messege){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at store opration'
                ]);
            }

            $requestData += ['subject' => static::MAIL_SUBJECT ];
            Mail::to(static::RECIVER_MAIL)->            // Our Email 'reciever'
            send( new ContactMail( $requestData ) );

            // If Found Success
            return response()->json([
                'status' => 'success',
                "msg"    => "messege sent successfully",
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'server error'
            ]);
        }
    }

}
