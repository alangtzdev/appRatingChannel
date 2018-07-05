<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
   public function getLogin()
   {
      return view('login.login');
   }

   public function getRestorePassword()
   {
      return view('login.restorepassword');
   }
   
   public function getCreateAcount()
   {
      return view('login.createacount');
   }
}
