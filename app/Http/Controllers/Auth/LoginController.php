<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers; 

class LoginController extends Controller
{
   use AuthenticatesUsers;
   
   public function __construct()
   {
      $this->middleware('guest:admin');
   }

   /*--- LOGIN ---*/
   public function getLogin()
   {
      return view('login.login');
   }
   /*--- END LOGIN ---*/

   public function postLogin(Request $request)
   {
      $this->validate($request, [
         'email' => 'required|email',
         'password' => 'required',
      ]);

      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
         return redirect()->intended(route('dashboard'));
      }
      
      return redirect()->back()->withInput($request->only('email', 'remember'));
   }
   
   public function logout(){
      Auth::guard('admin')->logout();
      return redirect('/');
   }
}
