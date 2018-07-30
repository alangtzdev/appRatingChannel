<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
      //      $datos = array_merge((array)Input::get('D_U'), (array)Input::get('D_E'));
      //
      //      $rules = array(
      //         "usuario"=>"required",
      //         "email"=>"required",
      //         "tipousuario"=>"required",
      //         "nombre"=>"required",
      //         "apPaterno"=>"required",
      //         "apMaterno"=>"required",
      //         "sexo"=>"required",
      //         "fechanacimiento"=>"required"
      //      );
      //
      //      $messages = array(
      //         "required"=>"Este campo (:attribute) es requerido",
      //      );
      //
      //      $validacion = Validator::make($datos,$rules,$messages);
      //
      //      if($validacion->fails()){
      //         $val = $validacion->messages();
      //         return Redirect::back()->with('Error', $val);
      //      }
      //      else{
      //         //            $direccion = (array) Input::get('D_D');
      //         //            $alumno    = new Alumno((array)Input::get('D_A'));
      //         //            $direccion = Direccion::create($direccion);
      //         //            $val = $direccion->alumno()->save($alumno);
      //         return redirect('admin/users')->with('Info', '¡¡El usuario ha sido Registrado Exitosamente!!');
      //      }
      return redirect('admin/users')->with('info', '¡¡El usuario ha sido Registrado Exitosamente!!');
   }

   public function postUsers()
   {
      $users = DB::table('users')
         ->join('roles', 'users.id_Rol', '=', 'roles.id_Rol')
         ->join('employees', 'users.id_Employee', '=', 'employees.id_Employee')
         ->select('users.id_User', 'users.name', 'users.email', 'roles.id_Rol', 'roles.name', 'employees.id_Employee', 'employees.name', 'employees.apPaterno', 'employees.apMaterno', 'employees.gender', 'employees.dateBirth')->orderBy('users.name')->get();
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
   public function edit($id)
   {
      //
   }

   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id)
   {
      //
   }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
   {
      //
   }
}
