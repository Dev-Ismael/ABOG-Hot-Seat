<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoManagement;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session as Session;

class TestController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( Request $request )
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
