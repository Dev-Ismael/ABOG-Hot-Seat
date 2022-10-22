<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNewsletterRequest;
use App\Mail\NewsletterMail;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::orderBy('id','desc')->paginate(10);
        return response()->json($newsletters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsletterRequest $request)
    {

        // save all request in one variable
        $requestData = $request->all();

        // return response()->json([
        //     "requestData" => $requestData,
        // ]);

        // Store in DB
        try {

            // store row in table
            $newsletter = Newsletter::create( $requestData );

            // if not save in DB
            if(!$newsletter){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at store opration'
                ]);
            }


            // Get All Subscribers
            $subscribers = Subscriber::pluck('email')->toArray();


            // Send Mail
            Mail::to($subscribers)->            // Our Email 'reciever'
            send( new NewsletterMail( $requestData ) );



            // If Found Success
            return response()->json([
                'status' => 'success',
                "msg"    => "Newsletter store successfully",
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'server error'
            ]);
        }


    }

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
            $newsletter = Newsletter::where('id', $id )->first();

            if( !$newsletter ){  // If Not Found
                return response()->json([
                    'status' => 'error',
                    'msg'    => '404 not found'
                ]);
            }

            return response()->json([ // If Found Success
                'status' => 'success',
                "msg"    => "newsletter get successfully",
                'data'   => $newsletter
            ]);
        } catch (\Exception $e) {
            return response([
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
        $newsletter = Newsletter::where('id', $id )->first();

        if( !$newsletter ){  // If Not Found
            return response()->json([
                'status' => 'error',
                'msg'    => '404 not found'
            ]);
        }


        // Delete Record from DB
        try {

            $delete = $newsletter->delete();
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
                'msg'    => 'Newsletter deleted successfully'
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

            // Find Matchs records
            $newsletters = Newsletter::where('subject', 'like', "%{$request->searchVal}%")->paginate( 10 );

            // If Not Delete Record
            if( !$newsletters ){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at search opration'
                ]);
            }

            return response()->json([
                'status'   => 'success',
                'msg'      => 'Searching opration successfully',
                'data'     => $newsletters,
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


        // return response()->json([
        //     "requestData" => $request->all(),
        // ]);


        // If Action is Delete
        if( $request->action == "delete" ){

            $ids = explode(",", $request->id);


            try {
                $delete = Newsletter::destroy( $ids );

                if( !$delete ){
                    return response()->json([
                        'status' => 'error',
                        'msg'    => 'Error at delete opration'
                    ]);
                }

                // If Delete Succesffuly
                return response()->json([
                    'status' => 'success',
                    'msg'    => 'Newsletters deleted successfully'
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
