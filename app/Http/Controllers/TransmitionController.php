<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Transmition;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class TransmitionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
      $transmitions = Transmition::all();
      return $transmitions;
   }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
   {
      //
   }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
   {
      //
   }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show(Request $request)
   {
      $dates = explode(' - ',$request->daterange);
      $date_start = Carbon::parse($dates[0]);
      $date_end = Carbon::parse($dates[1]);
      $national_Time = Carbon::parse($request->nationalTime)->format('H:i:s');
      $run_Time = $request->runTime;

      $transmitions = DB::table('transmitions')
         ->join('programs', 'transmitions.id_Program', '=', 'programs.id_Program')
         ->join('typetransmition', 'transmitions.id_TypeTransmition', '=', 'typetransmition.id_TypeTransmition')
         ->select('programs.name', 'typetransmition.nameTransmition', 'transmitions.day', 'transmitions.nationalTime', 'transmitions.runTime', 'transmitions.AA')
         ->whereDate('transmitions.day', '>=', $date_start)
         ->whereDate('transmitions.day', '<=', $date_end)
         ->whereTime('transmitions.nationalTime', '=', $national_Time)
         ->where('transmitions.runTime', '=', $run_Time)
         ->get();
      $array = [
         'LUNES' => ['AA' => 0, 'DAY' => 'LUNES'],
         'MARTES' => ['AA' => 0, 'DAY' => 'MARTES'],
         'MIERCOLES' => ['AA' => 0, 'DAY' => 'MIERCOLES'],
         'JUEVES' => ['AA' => 0, 'DAY' => 'JUEVES'],
         'VIERNES' => ['AA' => 0, 'DAY' => 'VIERNES'],
         'SABADO' => ['AA' => 0, 'DAY' => 'SABADO'],
         'DOMINDO' => ['AA' => 0, 'DAY' => 'DOMINGO']
      ];
      $sumLun = 0;
      $sumMar = 0;
      $sumMier = 0;
      $sumJue = 0;
      $sumVie = 0;
      $sumSab = 0;
      $sumDom = 0;

      foreach($transmitions as $transmition){
         $day = Carbon::parse($transmition->day);

         if($day->dayOfWeek == Carbon::MONDAY){
            $sumLun += $transmition->AA;
            array_set($array, 'LUNES.AA', $sumLun);
         }
         else if($day->dayOfWeek == Carbon::TUESDAY){
            $sumMar += $transmition->AA;
            array_set($array, 'MARTES.AA', $sumMar);
         }else if($day->dayOfWeek == Carbon::WEDNESDAY){
            $sumMier += $transmition->AA;
            array_set($array, 'MIERCOLES.AA', $sumMier);
         }else if($day->dayOfWeek == Carbon::THURSDAY){
            $sumJue += $transmition->AA;
            array_set($array, 'JUEVES.AA', $sumJue);
         }else if($day->dayOfWeek == Carbon::FRIDAY){
            $sumVie += $transmition->AA;
            array_set($array, 'VIERNES.AA', $sumVie);
         }else if($day->dayOfWeek == Carbon::SATURDAY){
            $sumSab += $transmition->AA;
            array_set($array, 'SABADO.AA', $sumSab);
         }else if($day->dayOfWeek == Carbon::SUNDAY){
            $sumDom += $transmition->AA;
            array_set($array, 'DOMINDO.AA', $sumDom);
         }
      }

      dd($array);
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
