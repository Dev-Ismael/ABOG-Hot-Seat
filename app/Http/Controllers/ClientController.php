<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id','desc')->get();
        return response()->json($clients);
    }

}
