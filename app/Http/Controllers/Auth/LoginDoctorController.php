<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginDoctorController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:doctor')->except('logout'); 
       }
       public function doctorLogin(Request $request)
       {
           $this->validate($request, [
               'email'   => 'required|email',
               'password' => 'required|min:6'
           ]);
           if ( Auth::guard( 'doctor' )->attempt( $request->only( 'email', 'password' ), $request->filled( 'remember' ) ) ) {

   
               return redirect()->intended('/doctor');
           }
           return back()->withInput($request->only('email', 'remember'));
       }
}
