<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function view()
    {
        return view('auth.adminLogin');
    }

    public function authProcess(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            // return redirect()->intended('/admin/users');
        }

        return back()->withErrors(['email' => 'These credentials do not match our records.'])
            ->withInput($request->only('email', 'remember'));

    }

}
