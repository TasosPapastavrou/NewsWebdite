<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }


    public function showloginform()
    {
        return view('authAdmin.admin-login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
 
       // $credentials = $request->only('email','password'); if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))   admin.post.upload  return redirect()->intended(route('admin.dashboard'));

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
        {
            return redirect()->intended(route('admin.dashboard')); 
        }
        
        return redirect()->back($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->intended(route('admin.login'));
    }

}
