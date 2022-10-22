<?php

namespace App\Http\Controllers\Admin;

use App\Models\SeoManagement;
use App\Http\Requests\UpdateSeoManagementRequest;
use App\Http\Controllers\Controller;

class SeoManagementController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeoManagement  $seoManagement
     * @return \Illuminate\Http\Response
     */
    public function show(SeoManagement $seoManagement)
    {
        try{
            // Find Record In Db Column
            $seo = SeoManagement::where('id', 1 )->first();

            if( !$seo ){  // If Not Found
                return response()->json([
                    'status' => 'error',
                    'msg'    => '404 not found'
                ]);
            }

            return response()->json([ // If Found Success
                'status' => 'success',
                "msg"    => "seo get successfully",
                'data'   => $seo
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
     * @param  \App\Http\Requests\UpdateSeoManagementRequest  $request
     * @param  \App\Models\SeoManagement  $seoManagement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSeoManagementRequest $request, SeoManagement $seoManagement)
    {

        $requestData = $request->all();

        // Find Record In Db Column
        $seo = SeoManagement::where('id', 1 )->first();

        // Update in DB
        try {

            // update row in table
            $update = $seo-> update( $requestData );

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
                "msg"    => "Seo updated successfully",
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'server error'
            ]);
        }
    }

}
