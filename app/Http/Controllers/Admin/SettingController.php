<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        try{
            // Find Record In Db Column
            $setting = Setting::where('id', 1 )->first();

            if( !$setting ){  // If Not Found
                return response()->json([
                    'status' => 'error',
                    'msg'    => '404 not found'
                ]);
            }

            return response()->json([ // If Found Success
                'status' => 'success',
                "msg"    => "settings get successfully",
                'data'   => $setting
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
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $requestData = $request->all();

        // Find Record In Db Column
        $settings = Setting::where('id', 1 )->first();

        // Update in DB
        try {

            // update row in table
            $update = $settings-> update( $requestData );

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
                "msg"    => "Setting updated successfully",
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'server error'
            ]);
        }
    }

}
