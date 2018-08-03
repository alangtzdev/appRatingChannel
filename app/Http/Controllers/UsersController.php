<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Empoyee;
use Illuminate\Http\Request;
use App\Models\{User, Employee};
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
      //
   }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
   {
      return view('layout.users.users');
   }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   public function postRegisterUsers(Request $request)
   {
      $d_u = array_get($request, 'D_U');
      $d_e = array_get($request, 'D_E');
      $datas = array_collapse([$d_u,$d_e]);

      $rules = [
         "name"=>"required",
         "email"=>"required|email",
         "id_Rol"=>"required",
         "name"=>"required",
         "apPaterno"=>"required",
         "apMaterno"=>"required",
         "gender"=>"required",
         "dateBirth"=>"required"
      ];

      $messages = [
         "required"=>"El campo :attribute es requerido",
         "email"=>"El campo :attribute requiere correo",
      ];

      $validator = Validator::make($datas,$rules,$messages);

      if($validator->fails()){
         $errors = $validator->messages();
         return redirect('admin/users')->with('error', $errors);
      }
      else{
         $user = new User($d_u);
         $user->password = bcrypt(array_get($d_u, 'password'));
         $user->status = 'ACTIVO';
         $employee = Employee::create($d_e);
         $employee->user()->save($user);
         return redirect('admin/users')->with('info', '¡¡El usuario ' . $user->name . ' ha sido Registrado Exitosamente!!');
      }
   }

   public function postUsers()
   {
      $users = DB::table('users')
         ->join('roles', 'users.id_Rol', '=', 'roles.id_Rol')
         ->join('employees', 'users.id_Employee', '=', 'employees.id_Employee')
         ->select('users.id_User', 'users.name as username', 'users.email', 'roles.id_Rol', 'roles.name as rol', 'employees.id_Employee', 'employees.name', 'employees.apPaterno', 'employees.apMaterno', 'employees.gender', 'employees.dateBirth')->where('users.status', '=', 'ACTIVO')
         ->orderBy('users.name', 'acs')
         ->get();
      return $users;
   }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
   {
      //
   }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function postUserById($id)
   {
      $user = DB::table('users')
         ->join('roles', 'users.id_Rol', '=', 'roles.id_Rol')
         ->join('employees', 'users.id_Employee', '=', 'employees.id_Employee')
         ->select('users.id_User', 'users.name as username', 'users.email', 'roles.id_Rol', 'roles.name as rol', 'employees.id_Employee', 'employees.name', 'employees.apPaterno', 'employees.apMaterno', 'employees.gender', 'employees.dateBirth')->where('users.id_User', '=', $id)
         ->get();
      return $user;
   }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function postUpdateUsers(Request $request, $id)
   {
      //
   }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function getDestroyUser($id)
   {
      $user = DB::table('users')
         ->where('id_User', $id)
         ->update(['status' => 'BAJA']);

      return redirect('admin/users')->with('warning', '¡¡El usuario ha sido dado de baja Exitosamente!!');
   }
}
