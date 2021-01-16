<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginWriterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:writer');
    }


    public function showloginform()
    {
        return view('authWriter.writer-login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ]);

       // $credentials = $request->only('email','password'); if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))

        if(Auth::guard('writer')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
        {
            return redirect()->intended(route('writer.dashboard'));
        }
        
        return redirect()->back($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('writer')->logout();
        return redirect()->intended(route('writer.login'));
    }
}
