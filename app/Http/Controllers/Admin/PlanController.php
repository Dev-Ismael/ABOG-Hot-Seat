<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Http\Requests\UpdatePlanRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        try{
            // Find Record In Db Column
            $plan = Plan::where('id', 1 )->first();

            if( !$plan ){  // If Not Found
                return response()->json([
                    'status' => 'error',
                    'msg'    => '404 not found'
                ]);
            }

            return response()->json([ // If Found Success
                'status' => 'success',
                "msg"    => "Plan pricing get successfully",
                'data'   => $plan
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
     * @param  \App\Http\Requests\UpdatePlanRequest  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        $requestData = $request->all();

        // Find Record In Db Column
        $plan = Plan::where('id', 1 )->first();


        try {

            // update row in table
            $update = $plan-> update( $requestData );

            // if not save in DB
            if(!$update){
                return response()->json([
                    'status' => 'error',
                    'msg'    => 'Error at update opration'
                ]);
            }

            // If store Success
            return response()->json([
                'status' => 'success',
                "msg"    => "Plan pricing updated successfully",
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'msg'    => 'server error'
            ]);
        }

    }

}
