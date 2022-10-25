<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function view()
    {
            $this->middleware('guest:admin')->except('logout');
        return view('auth.adminLogin');
    }

    public function authProcess(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect('/admin/dashboard');
        }

        return back()->withErrors(['email' => 'These credentials do not match our records.'])
            ->withInput($request->only('email', 'remember'));

    }

    public function adminLogout(Request $request)
    {

        Auth::guard('admin')->logout();
        // return redirect('/');

        // try{
        //     Auth::guard('admin')->logout();
        //     return response([
        //         'status' => 'success',
        //         'msg'    => 'logout successfully!'
        //     ]);
        // } catch (\Exception $e) {
        //     return response([
        //         'status' => 'error',
        //         'msg'    => 'logout failed!'
        //     ]);
        // }

    }

}
