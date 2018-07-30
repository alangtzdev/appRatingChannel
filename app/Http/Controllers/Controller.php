<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
   /*--- LOGIN ---*/
   public function getLogin()
   {
      return view('login.login');
   }
   /*--- END LOGIN ---*/
   
   /*--- RESTORE PASSWORD ---*/
   public function getRestorePassword()
   {
      return view('login.restorepassword');
   }
   /*--- ENDE RESTORE PASSWORD ---*/
   
   /*--- DASHBOARD ---*/
   public function getDashboard()
   {
      return view('layout.principals.dashboard');
   }
   /*--- END DASHBOARD ---*/
      
   /*--- LOCK SCREEN ---*/
   public function getLockScreen()
   {
      return view('layout.principals.lockscreen');
   }
   /*--- END LOCK SCREEN ---*/
   
   /*--- LOG OUT ---*/
   public function getLogOut()
   {
      return view('login.login');
   }
   /*--- END LOG OUT ---*/
      
   /*--- LOG REPORTS ---*/
   public function getDateTimePickers()
   {
      return view('layout.datetimepickers');
   }
   /*--- END REPORTS ---*/
}
