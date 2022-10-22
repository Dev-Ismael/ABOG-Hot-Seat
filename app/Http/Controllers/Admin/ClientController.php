<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Clients\StoreClientRequest;
use App\Http\Requests\Clients\UpdateClientRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id','desc')->paginate(10);
        return response()->json($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {

        // save all request in one variable
        $requestData = $request->all();


        // get Image extention
        $img_extention = $request -> img -> getClientOriginalExtension();
        // Create Image name
        $img_name = rand(1000000,10000000) . "." . $img_extention;   // name => 32632.png

        // Path
        $path = "images/clients/" ;

        $resize_image = Image::make($request->img);

        // resize the image to a height of 200 and constrain aspect ratio (auto width)
        $resize_image->resize( null , 50, function ($constraint) {
            $constraint->aspectRatio();
        });

        // Upload
        $resize_image->save( public_path( $path . $img_name  ) );
        // Or Us laravel Function move
        // $resize_image -> move( $path , $img_name );


        // Add images names in request array
        $requestData['img']  = $img_name;


        // return response()->json([
        //     "requestData" => $requestData,
        // ]);

        // Store in DB
        try {

            // store row in table
            $client = Client::create( $requestData );

            // if not save in DB
            if(!$client){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at store opration'
                ]);
            }

            // If Found Success
            return response()->json([
                'status' => 'success',
                "msg"    => "Client store successfully",
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
            $client = Client::where('id', $id )->first();

            if( !$client ){  // If Not Found
                return response()->json([
                    'status' => 'error',
                    'msg'    => '404 not found'
                ]);
            }

            return response()->json([ // If Found Success
                'status' => 'success',
                "msg"    => "client get successfully",
                'data'   => $client
            ]);
        } catch (\Exception $e) {
            return response([
                'status' => 'error',
                'msg'    => 'server error'
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id)
    {

        // Find Record In Db Column
        $client = Client::where('id', $id )->first();

        if( !$client ){  // If Not Found
            return response()->json([
                'status' => 'error',
                'msg'    => '404 not found'
            ]);
        }

        // save all request in one variable
        $requestData = $request->all();

        // Check If There Images Uploaded
        $path = "images/clients/" ;


        if( $request -> hasFile("img") ){

            // get Image extention
            $img_extention = $request -> img -> getClientOriginalExtension();
            // Create Image name
            $img_name = rand(1000000,10000000) . "." . $img_extention;   // name => 32632.png

            $resize_image = Image::make($request->img);

            // resize the image to a height of 50 and constrain aspect ratio (auto width)
            $resize_image->resize( null , 50, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Upload
            $resize_image->save( public_path( $path . $img_name  ) );

        }else{
            $img_name = $client->img;
        }

        // Add images names in request array
        $requestData['img']  = $img_name;


        // return response()->json([
        //     'requestData' => $requestData,
        // ]);

        // Store in DB
        try {

            // store row in table
            $update = $client-> update( $requestData );

            // if not save in DB
            if(!$update){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at update opration'
                ]);
            }

            // If Found Success
            return response()->json([
                'status' => 'success',
                "msg"    => "Client updated successfully",
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
        $client = Client::where('id', $id )->first();

        if( !$client ){  // If Not Found
            return response()->json([
                'status' => 'error',
                'msg'    => '404 not found'
            ]);
        }


        // Delete Record from DB
        try {

            // Get Image Path
            $image_path = public_path("images/clients/". $client->img) ;

            if( File::exists($image_path) ) {

                $delete_file = File::delete($image_path);
                // If Delete Error
                if( !$delete_file ){
                    return response()->json([
                        'status' => 'error',
                        'msg'    => 'Error at delete opration'
                    ]);
                }

            }

            $delete_row = $client->delete();

            // If Delete Error
            if( !$delete_row ){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at delete opration'
                ]);
            }

            // If Delete Succesffuly
            return response()->json([
                'status' => 'success',
                'msg'    => 'Client deleted successfully'
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
            $clients = Client::where('title', 'like', "%{$request->searchVal}%")->paginate( 10 );

            // If Not Delete Record
            if( !$clients ){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at search opration'
                ]);
            }

            return response()->json([
                'status'   => 'success',
                'msg'      => 'Searching opration successfully',
                'data'     => $clients,
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

                // Get All Selected rows by $ids
                $images = Client::whereIn('id', $ids)->pluck('img');

                foreach ($images as $image) {

                    // Get Image Path
                    $image_path = public_path("images/clients/". $image) ;

                    if( File::exists($image_path) ) {

                        $delete_file = File::delete($image_path);
                        // If Delete Error
                        if( !$delete_file ){
                            return response()->json([
                                'status' => 'error',
                                'msg'    => 'Error at delete opration'
                            ]);
                        }

                    }

                }


                $delete_rows = Client::destroy( $ids );

                if( !$delete_rows ){
                    return response()->json([
                        'status' => 'error',
                        'msg'    => 'Error at delete opration'
                    ]);
                }


                // If Delete Succesffuly
                return response()->json([
                    'status' => 'success',
                    'msg'    => 'Client deleted successfully'
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
