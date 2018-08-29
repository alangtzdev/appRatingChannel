<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Transmition;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Routing\ResponseFactory;
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
   public function dayTime(Request $request)
   {
      //if($request->ajax()){
      $dates = explode(' - ',$request->daterange);
      $date_start = Carbon::parse($dates[0]);
      $date_end = Carbon::parse($dates[1]);
      $nationalTime = Carbon::parse($request->nationalTime)->format('H:i:s');
      $runTime = $request->runTime;
      $programs = $request->programs;
      $transmitions = DB::table('transmitions')
         ->join('programs', 'transmitions.id_Program', '=', 'programs.id_Program')
         ->join('typetransmition', 'transmitions.id_TypeTransmition', '=', 'typetransmition.id_TypeTransmition')
         ->select('programs.name as program_name', 'transmitions.day', 'transmitions.AA')
         ->whereDate('transmitions.day', '>=', $date_start)
         ->whereDate('transmitions.day', '<=', $date_end)
         ->whereTime('transmitions.nationalTime', '=', $nationalTime)
         ->whereIn('programs.id_Program', $programs)
         ->whereIn('transmitions.runTime', $runTime)
         ->get();

      $graphics = collect([]);
      $dias = collect([]);

      $helpDias = [ 0 => 'Domingo', 1 => 'Lunes', 2 => 'Martes', 3 => 'Miercoles', 4 => 'Jueves', 5 => 'Viernes', 6 => 'Sábado' ];

      foreach($transmitions as $transmition){
         $day = Carbon::parse($transmition->day);

         if($dias->isNotEmpty()){
            if(!$dias->contains($day->dayOfWeek)){
               $dias->push($day->dayOfWeek);
            }
         }else{
            $dias->push($day->dayOfWeek);
         }

         if($graphics->isNotEmpty()){
            foreach($graphics as $keyGraphic=>$itemGraphic){

               $datos = array_get($itemGraphic, 'Datos');

               if($datos->contains('label', $transmition->program_name)){

                  foreach($datos as $keyDato=>$itemDato){

                     $label = array_get($itemDato, 'label');

                     if($label == $transmition->program_name){

                        $datas = array_get($itemDato, 'data');
                        $counts = array_get($itemDato, 'counts');
                        $days = array_get($itemDato, 'days');

                        foreach($datas as $keyData=>$itemData){

                           if($keyData == $day->dayOfWeek){

                              $itemData += $transmition->AA;
                              $datas->put($keyData, $itemData);

                           }
                           else{

                              $datas->put($day->dayOfWeek, $transmition->AA);

                           }

                           break;
                        }

                        foreach($counts as $keyCount=>$itemCount){

                           if($keyCount == $day->dayOfWeek){

                              $itemCount += 1;
                              $counts->put($keyCount, $itemCount);

                           }
                           else{

                              $counts->put($day->dayOfWeek, 1);

                           }

                           break;
                        }

                        foreach($days as $keyDay=>$itemDay){
                           $days->push(''.$day->dayOfWeek.': '.$transmition->day.' - '.$transmition->program_name.'');

                           break;
                        }
                     }
                     break;
                  }
               }else{
                  $datos->push([
                     'label' => $transmition->program_name,
                     'data' => collect([
                        $day->dayOfWeek  => $transmition->AA
                     ]),
                     'backgroundColor' => 'rgba(54, 162, 235, 1)',
                     'counts' => collect([
                        $day->dayOfWeek => 1
                     ]),
                     'days' => collect([
                        ''.$day->dayOfWeek.': '.$transmition->day.' - '.$transmition->program_name.''
                     ])
                  ]);
               }

               break;
            }
         }else{
            $graphics->prepend([
               'Datos' => collect([
                  [
                     'label' => $transmition->program_name,
                     'data' => collect([
                        $day->dayOfWeek  => $transmition->AA
                     ]),
                     'backgroundColor' => 'rgba(54, 162, 235, 1)',
                     'counts' => collect([
                        $day->dayOfWeek => 1
                     ]),
                     'days' => collect([
                        ''.$day->dayOfWeek.': '.$transmition->day.' - '.$transmition->program_name.''
                     ])
                  ]
               ])
            ]);
         }
      }
      //
      //      $sorted = $graphics->sortBy('DiaInt');
      //      dd($sorted->values()->all());

      dd($graphics);
   }

   public function reportTime(Request $request)
   {
      dd('success');
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
