<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        return response()->json($users);
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
            $user = User::where('id', $id )->first();

            if( !$user ){  // If Not Found
                return response()->json([
                    'status' => 'error',
                    'msg'    => '404 not found'
                ]);
            }

            return response()->json([ // If Found Success
                'status' => 'success',
                "msg"    => "user get successfully",
                'data'   => $user
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
        $user = User::where('id', $id )->first();

        if( !$user ){  // If Not Found
            return response()->json([
                'status' => 'error',
                'msg'    => '404 not found'
            ]);
        }


        // Delete Record from DB
        try {

            $delete = $user->delete();
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
                'msg'    => 'User deleted successfully'
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
            $users = User::where('name', 'like', "%{$request->searchVal}%")->paginate( 10 );

            // If Not Delete Record
            if( !$users ){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at search opration'
                ]);
            }

            return response()->json([
                'status'   => 'success',
                'msg'      => 'Searching opration successfully',
                'data'     => $users,
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
                $delete = User::destroy( $ids );

                if( !$delete ){
                    return response()->json([
                        'status' => 'error',
                        'msg'    => 'Error at delete opration'
                    ]);
                }

                // If Delete Succesffuly
                return response()->json([
                    'status' => 'success',
                    'msg'    => 'Users deleted successfully'
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
