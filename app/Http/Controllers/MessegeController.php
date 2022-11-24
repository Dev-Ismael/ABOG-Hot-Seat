<?php

namespace App\Http\Controllers;

use App\Models\Messege;
use App\Http\Requests\StoreMessegeRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessegeController extends Controller
{

    CONST RECIVER_MAIL   = 'info@ahsboardprep.com' ;
    CONST MAIL_TITLE   = 'A new contact submition at AhsBoardPrep.com' ;

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
                return abort(500, 'Whatever you were looking for, look somewhere else');
            }

            $requestData += [ 'title' => static::MAIL_TITLE ];
            Mail::to(static::RECIVER_MAIL)->                 // Our Email 'reciever'
            send( new ContactMail( $requestData ) );

            return view('submission', [
                'messege' => 'Thanks, Your submission sent successfully!',
                'link' => 'home'
            ]);

        } catch (\Exception $e) {
            return abort(500, 'Whatever you were looking for, look somewhere else');
        }
    }

}
