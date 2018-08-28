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
   public function show(Request $request)
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

      $dias = [
         0 => 'Domingo',
         1 => 'Lunes',
         2 => 'Martes',
         3 => 'Miercoles',
         4 => 'Jueves',
         5 => 'Viernes',
         6 => 'Sábado'
      ];

      foreach($transmitions as $transmition){
         $day = Carbon::parse($transmition->day);

         if($graphics->isNotEmpty()){
            if($graphics->contains('DiaInt', $day->dayOfWeek)){

               $byDay = $graphics->Where('DiaInt', $day->dayOfWeek);
               $keyDay = $byDay->keys();
               $valKeyDay = array_get($keyDay, 0);

               foreach($byDay as $itemDay){
                  $Datos = array_get($itemDay, 'Datos');
                  if($Datos->contains('label', $transmition->program_name)){

                     $byDato = $Datos->Where('label', $transmition->program_name);
                     $keyDato = $byDato->keys();
                     $valKeyDato = array_get($keyDato, 0);

                     foreach($byDato as $itemDato){

                        $count = array_get($itemDato, 'count');
                        $count += 1;

                        $byDatas = array_get($itemDato, 'data');
                        $keyData = $byDatas->keys();
                        $valKeyData = array_get($keyData, 0);

                        foreach($byDatas as $data){
                           $data += $transmition->AA;
                           $byDatas->put($valKeyData, $data);
                        }
                        array_set($itemDato, 'count', $count);
                        $byDato->put($valKeyDato, $itemDato);
                     }
                     array_set($itemDay, 'Datos', $byDato);
                     $graphics->put($valKeyDay, $itemDay);
                  }else{
                     $Datos->push([
                        'label' => $transmition->program_name,
                        'data' => collect([$transmition->AA]),
                        'backgroundColor' => 'rgba(54, 162, 235, 1)',
                        'count' => 1
                     ]);
                  }
               }
            }else{
               $graphics->prepend([
                  'DiaInt' => $day->dayOfWeek,
                  'DiaString' => array_get($dias, $day->dayOfWeek),
                  'DateTrasmintion' => $transmition->day,
                  'Datos' => collect([
                     [
                        'label' => $transmition->program_name,
                        'data' => collect([$transmition->AA]),
                        'backgroundColor' => 'rgba(54, 162, 235, 1)',
                        'count' => 1
                     ]
                  ])
               ]);
            }
         }else{

            $graphics->prepend([
               'DiaInt' => $day->dayOfWeek,
               'DiaString' => array_get($dias, $day->dayOfWeek),
               'DateTrasmintion' => $transmition->day,
               'Datos' => collect([
                  [
                     'label' => $transmition->program_name,
                     'data' => collect([$transmition->AA]),
                     'backgroundColor' => 'rgba(54, 162, 235, 1)',
                     'count' => 1
                  ]
               ])
            ]);
         }
         //         $countG = count($graphics);
         //
         //         if($countG > 0){
         //            foreach($graphics as $key => $graphic)
         //            {
         //               $DiaInt = array_get($graphic, 'DiaInt');
         //               if($DiaInt == $day->dayOfWeek){
         //                  $datos = array_get($graphic, 'Datos');
         //                  foreach($datos as $dato){
         //                     $label = array_get($dato, 'label');
         //                     if($label == $transmition->program_name){
         //                        $countDato = array_get($dato, 'count');
         //                        $countDato += 1;
         //                        $datas = array_get($dato, 'data');
         //                        foreach($datas as $data){
         //                           $data += $transmition->AA;
         //                           array_set($dato, 'data', [$data]);
         //                        }
         //                        array_set($dato, 'count', $countDato);
         //                        array_set($graphic, 'Datos', $dato);
         //                        array_set($graphics, $key, $graphic);
         //                     }
         //                  }
         //               }else{
         //                  $graphics = array_set($graphics, $key, [
         //                     'DiaInt' => $day->dayOfWeek,
         //                     'DiaString' => array_get($dias, $day->dayOfWeek),
         //                     'Datos' => [
         //                        [
         //                           'label' => $transmition->program_name,
         //                           'data' => [$transmition->AA],
         //                           'backgroundColor' => 'rgba(54, 162, 235, 1)',
         //                           'count' => 1
         //                        ]
         //                     ]
         //                  ]);
         //               }
         //            }
         //         }else{
         //            $graphics = array_prepend($graphics, [
         //               'DiaInt' => $day->dayOfWeek,
         //               'DiaString' => array_get($dias, $day->dayOfWeek),
         //               'Datos' => [
         //                  [
         //                     'label' => $transmition->program_name,
         //                     'data' => [$transmition->AA],
         //                     'backgroundColor' => 'rgba(54, 162, 235, 1)',
         //                     'count' => 1
         //                  ]
         //               ]
         //            ]);
         //         }
      }

      $sorted = $graphics->sortBy('DiaInt');
      dd($sorted->values()->all());
      //      $sorted = array_values(array_sort($graphics, function ($value) {
      //         return $value['DiaInt'];
      //      }));
      //      dd($graphics);
      //}
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
