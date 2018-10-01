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
      if($request->ajax()){
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

            //*** --------------------------------------------------------------- ***//

            //*** ADD DAY IN ARRAY DAYS ***//

            if($dias->isNotEmpty()){
               if(!$dias->contains($day->dayOfWeek)){
                  foreach($helpDias as $keyHelpDia=>$itemHelpDia){
                     if($keyHelpDia == $day->dayOfWeek){
                        $dias->put($day->dayOfWeek, $itemHelpDia);
                     }
                  }
               }
            }else{
               foreach($helpDias as $keyHelpDia=>$itemHelpDia){
                  if($keyHelpDia == $day->dayOfWeek){
                     $dias->put($day->dayOfWeek, $itemHelpDia);
                  }
               }
            }

            //*** --------------------------------------------------------------- ***//

            //*** ADD CONSULT IN ARRAY GRAPHICS ***//

            //*** INIT PUSH AND PUT GRAPHICS ***//
            //*** INIT IF GRAPHICS->ISNOTEMPTY ***//
            if($graphics->isNotEmpty()){
               //*** INIT FOREACH GRAPHICS ***//
               foreach($graphics as $keyGraphic=>$itemGraphic){

                  $datos = array_get($itemGraphic, 'Datos');
                  //*** INIT IF DATOS ***//
                  if($datos->contains('label', $transmition->program_name)){

                     //*** INIT FOREACH DATOS ***//
                     foreach($datos as $keyDato=>$itemDato){

                        $label = array_get($itemDato, 'label');

                        //*** INIT IF LABEL ***//
                        if($label == $transmition->program_name){

                           $Auxdatas = array_get($itemDato, 'Auxdata');
                           $counts = array_get($itemDato, 'counts');
                           $days = array_get($itemDato, 'days');

                           //*** INIT FOREACH DATAS ***//
                           foreach($Auxdatas as $keyData=>$itemData){

                              //*** INIT IF DAY-DATA ***//
                              if($keyData == $day->dayOfWeek){

                                 $itemData += $transmition->AA;
                                 $Auxdatas->put($keyData, $itemData);

                              }
                              //*** END IF DAY-DATA ***//

                              break;
                           }
                           //*** END FOREACH DATAS ***//

                           //*** INIT FOREACH COUNT ***//
                           foreach($counts as $keyCount=>$itemCount){

                              //*** INIT IF DAY-COUNT ***//
                              if($keyCount == $day->dayOfWeek){

                                 $itemCount += 1;
                                 $counts->put($keyCount, $itemCount);

                              }
                              //*** END IF DAY-COUNT ***//

                              break;
                           }
                           //*** END FOREACH COUNT ***//

                           //*** INIT FOREACH DAYS ***//
                           foreach($days as $keyDay=>$itemDay){
                              $days->push(''.$day->dayOfWeek.': '.$transmition->day.' - '.$transmition->program_name.'');

                              break;
                           }
                           //*** END FOREACH DAYS ***//

                        }
                        //*** END IF LABEL ***//

                        break;
                     }
                     //*** END FOREACH DATOS ***//
                  }else{
                     $datos->push([
                        'label' => $transmition->program_name,
                        'Auxdata' => collect([
                           $day->dayOfWeek => $transmition->AA
                        ]),
                        'data' => collect([]),
                        'backgroundColor' => 'rgba(54, 162, 235, 1)',
                        'counts' => collect([
                           $day->dayOfWeek => 1
                        ]),
                        'days' => collect([
                           ''.$day->dayOfWeek.': '.$transmition->day.' - '.$transmition->program_name.''
                        ])
                     ]);
                  }
                  //*** END IF DATOS ***//

                  break;
               }
               //*** END FOREACH GRAPHICS ***//
            }else{
               $graphics->prepend([
                  'Dias' => collect([]),
                  'Datos' => collect([
                     [
                        'label' => $transmition->program_name,
                        'Auxdata' => collect([
                           $day->dayOfWeek => $transmition->AA
                        ]),
                        'data' => collect([]),
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
            //*** END IF GRAPHICS->ISNOTEMPTY ***//
         }

         //               dd($graphics);

         //*** --------------------------------------------------------------- ***//

         //*** DIVIDE ***//

         //*** INIT FOREACH GRAPHICS ***//
         foreach($graphics as $keyGraphic=>$itemGraphic){

            $datos = array_get($itemGraphic, 'Datos');

            //*** INIT FOREACH DATOS ***//
            foreach($datos as $keyDato=>$itemDato){

               $Auxdatas = array_get($itemDato, 'Auxdata');

               //*** INIT FOREACH DATAS ***//
               foreach($Auxdatas as $keyData=>$itemData){

                  //*** INIT FOREACH COUNT ***//
                  foreach($counts as $keyCount=>$itemCount){

                     //*** INIT IF DAY-COUNT ***//
                     if($keyCount == $keyData){

                        $result = $itemData / $itemCount;
                        $Auxdatas->put($keyData, $result);

                     }
                     //*** END IF DAY-COUNT ***//

                  }
                  //*** END FOREACH COUNT ***//

               }
               //*** END FOREACH DATAS ***//
            }
            //*** END FOREACH DATOS ***//

         }
         //*** END FOREACH GRAPHICS ***//

         //      dd($graphics);

         //*** --------------------------------------------------------------- ***//

         //*** SORT ARRAY DAYS ***//

         $sortedDias = $dias->sortKeys();

         //*** --------------------------------------------------------------- ***//

         //*** ADD VALUES TO DAYS REST ***//

         //*** INIT FOREACH GRAPHICS ***//
         foreach($graphics as $keyGraphic=>$itemGraphic){

            $datos = array_get($itemGraphic, 'Datos');

            //*** INIT FOREACH DATOS ***//
            foreach($datos as $keyDato=>$itemDato){

               $Auxdatas = array_get($itemDato, 'Auxdata');
               $sortedDatas = $Auxdatas->sortKeys();

               //*** INIT FOREACH DATAS ***//
               foreach($sortedDatas as $keyData=>$itemData){

                  foreach($sortedDias as $keyDia=>$itemDia){
                     if($keyData != $keyDia){
                        $Auxdatas->put($keyDia, 0);
                     }
                  }

               }
               //*** END FOREACH DATAS ***//

               $exceptDays = array_except($itemDato, 'days');
               $datos->put($keyDato, $exceptDays);

            }
            //*** END FOREACH DATOS ***//

         }
         //*** END FOREACH GRAPHICS ***//

         //*** --------------------------------------------------------------- ***//

         //*** EXCEPT COUNT IN DATOS ***//

         //*** INIT FOREACH GRAPHICS ***//
         foreach($graphics as $keyGraphic=>$itemGraphic){

            $datos = array_get($itemGraphic, 'Datos');

            //*** INIT FOREACH DATOS ***//
            foreach($datos as $keyDato=>$itemDato){

               $exceptCounts = array_except($itemDato, 'counts');
               $datos->put($keyDato, $exceptCounts);
            }
            //*** END FOREACH DATOS ***//

         }
         //*** END FOREACH GRAPHICS ***//

         //*** --------------------------------------------------------------- ***//

         //*** ADD VALUES OF AUXDATAS IN DATAS ***//

         //*** INIT FOREACH GRAPHICS ***//
         foreach($graphics as $keyGraphic=>$itemGraphic){

            $datos = array_get($itemGraphic, 'Datos');

            //*** INIT FOREACH DATOS ***//
            foreach($datos as $keyDato=>$itemDato){

               $datas = array_get($itemDato, 'data');
               $Auxdatas = array_get($itemDato, 'Auxdata');
               $sortedAuxDatas = $Auxdatas->sortKeys();

               foreach($sortedAuxDatas as $keyAuxData=>$itemAuxData){
                  $datas->push($itemAuxData);
               }

               $datos->put($keyDato, $itemDato);
            }
            //*** END FOREACH DATOS ***//

         }
         //*** END FOREACH GRAPHICS ***//

         //*** --------------------------------------------------------------- ***//

         //*** EXCEPT AUXDATAS IN DATOS ***//

         //*** INIT FOREACH GRAPHICS ***//
         foreach($graphics as $keyGraphic=>$itemGraphic){

            $datos = array_get($itemGraphic, 'Datos');

            //*** INIT FOREACH DATOS ***//
            foreach($datos as $keyDato=>$itemDato){

               $exceptDatas = array_except($itemDato, 'Auxdata');
               $datos->put($keyDato, $exceptDatas);

            }
            //*** END FOREACH DATOS ***//

         }
         //*** END FOREACH GRAPHICS ***//

         //*** --------------------------------------------------------------- ***//

         //*** ADD ARRAY DAYS IN ARRAY GRAPHICS ***//

         //*** INIT FOREACH GRAPHICS ***//
         foreach($graphics as $keyGraphic=>$itemGraphic){

            $dias = array_get($itemGraphic, 'Dias');

            foreach($sortedDias as $keyDias=>$itemDias){
               $dias->push($itemDias);
            }
         }
         //*** END FOREACH GRAPHICS ***//
         return $graphics;
      }

      //      dd($graphics);
   }

  public function reportTime(Request $request)
  {
    if($request->ajax()){
      $dates = explode(' - ',$request->daterange);
      $hours = explode(' - ',$request->rangeHours);

      $date_start = Carbon::parse($dates[0]);
      $date_end = Carbon::parse($dates[1]);
      $hour_start = Carbon::createFromFormat('H:i', $hours[0])->toTimeString();
      $hour_end = Carbon::createFromFormat('H:i', $hours[1])->toTimeString();

      $transmitions = DB::table('transmitions')
          ->join('programs', 'transmitions.id_Program', '=', 'programs.id_Program')
          ->join('typetransmition', 'transmitions.id_TypeTransmition', '=', 'typetransmition.id_TypeTransmition')
          ->select('programs.name as program_name', 'transmitions.day', 'transmitions.AA',
                  'transmitions.nationalTime')
          ->whereDate('transmitions.day', '>=', $date_start)
          ->whereDate('transmitions.day', '<=', $date_end)
          ->whereTime('transmitions.nationalTime', '>=', $hour_start)
          ->whereTime('transmitions.nationalTime', '<=', $hour_end)
          ->get();

      $table = collect([]);
      $helptimes = collect([]);
      $helpDias = [ 0 => 'Domingo', 1 => 'Lunes', 2 => 'Martes', 3 => 'Miercoles', 4 => 'Jueves', 5 => 'Viernes', 6 => 'Sábado' ];

      foreach($transmitions as $transmition){
          $dayParse = Carbon::parse($transmition->day);
          $dayString = '';
          $time = $transmition->nationalTime;

          foreach($helpDias as $keyDay=>$itemDay){
            if($keyDay == $dayParse->dayOfWeek){
                $dayString = $itemDay;
            }
          }

          //*** --------------------------------------------------------------- ***//

          //*** ADD TIME IN ARRAY _TIMES ***//

          if($helptimes->isNotEmpty()){
            if(!$helptimes->contains($time)){
                $helptimes->push($time);
            }
          }else{
            $helptimes->push($time);
          }


          //*** --------------------------------------------------------------- ***//

          //*** ADD CONSULT IN ARRAY GRAPHICS ***//
          //*** INIT PUSH AND PUT TABLE ***//
          //*** INIT IF TABLE->ISNOTEMPTY ***//
          if($table->isNotEmpty()){
            //*** INIT FOREACH GRAPHICS ***//
            foreach($table as $keyGraphic=>$itemGraphic){
                $datos = array_get($itemGraphic, 'Datos');
                //*** INIT IF DATOS ***//
                if($datos->contains('day', $dayParse->dayOfWeek)){
                  //*** INIT FOREACH DATOS ***//
                  foreach($datos as $keyDato=>$itemDato){
                      $dayInt = array_get($itemDato, 'day');
                      //*** INIT IF DAYINT ***//
                      if($dayInt == $dayParse->dayOfWeek){
                        $dayDatas = array_get($itemDato, 'dayDatas');
                        //*** INIT IF DAYDATAS ***//
                        if($dayDatas->contains('time', $time)){
                            //*** INIT FOREACH DAYDATAS ***//
                            foreach($dayDatas as $keyDayData=>$itemDayData){
                              //*** INIT IF TIME ***//
                              $_time = array_get($itemDayData, 'time');
                              if($_time == $time){
                                  $timeDatas = array_get($itemDayData, 'timeDatas');
                                  //*** INIT IF TIMEDATAS ***//
                                  if($timeDatas->contains('program', $transmition->program_name)){
                                    //*** INIT FOREACH TIMEDATAS ***//
                                    foreach($timeDatas as $keyTimeData=>$itemTimeData){

                                        $_program = array_get($itemTimeData, 'program');

                                        if($_program == $transmition->program_name){
                                          $AA = array_get($itemTimeData, 'AA');
                                          $count = array_get($itemTimeData, 'count');

                                          $AA += $transmition->AA;
                                          $count += 1;

                                          array_set($itemTimeData, 'AA', $AA);
                                          array_set($itemTimeData, 'count', $count);

                                          $timeDatas->put($keyTimeData, $itemTimeData);
                                        }
                                    }
                                    //*** END FOREACH TIMEDATAS ***//
                                  }else{
                                    $timeDatas->push([
                                        'program' => $transmition->program_name,
                                        'AA' => $transmition->AA,
                                        'count' => 1
                                    ]);
                                  }
                                  //*** END IF TIMEDATAS ***//
                              }
                              //*** END IF TIME ***//
                            }
                            //*** END FOREACH DAYDATAS ***//
                        }else{
                            $dayDatas->push([
                              'time' => $time,
                              'timeDatas' => collect([
                                  [
                                    'program' => $transmition->program_name,
                                    'AA' => $transmition->AA,
                                    'count' => 1
                                  ]
                              ])
                            ]);
                        }
                        //*** END IF DAYDATAS ***//
                      }
                      //*** END IF DAYINT ***//
                  }
                  //*** END FOREACH DATOS ***//
                }else{
                  $datos->push([
                      'day' => $dayParse->dayOfWeek,
                      'dayDatas' => collect([
                        [
                            'time' => $time,
                            'timeDatas' => collect([
                              [
                                  'program' => $transmition->program_name,
                                  'AA' => $transmition->AA,
                                  'count' => 1
                              ]
                            ])
                        ]
                      ])
                  ]);
                }
                //*** END IF DATOS ***//
            }
            //*** END FOREACH GRAPHICS ***//
          }else{
            $table->prepend([
                'Days' => collect([]),
                'Times' => collect([]),
                'Datos' => collect([
                  [
                      'day' => $dayParse->dayOfWeek,
                      'dayDatas' => collect([
                        [
                            'time' => $time,
                            'timeDatas' => collect([
                              [
                                  'program' => $transmition->program_name,
                                  'AA' => $transmition->AA,
                                  'count' => 1
                              ]
                            ])
                        ]
                      ])
                  ]
                ])
            ]);
          }
          //*** END IF GRAPHICS->ISNOTEMPTY ***//
      }


      //*** --------------------------------------------------------------- ***//

      //*** DIVIDE ***//

      //*** INIT FOREACH GRAPHICS ***//
      foreach($table as $keyTable=>$itemTable){
          $datos = array_get($itemTable, 'Datos');
          //*** INIT FOREACH DATOS ***//
          foreach($datos as $keyDato=>$itemDato){
            $dayDatas = array_get($itemDato, 'dayDatas');
            //*** INIT FOREACH DAYDATAS ***//
            foreach($dayDatas as $keyDayData=>$itemDayData){
                $timeDatas = array_get($itemDayData, 'timeDatas');
                //*** INIT FOREACH TIMEDATAS ***//
                foreach($timeDatas as $keyTimeData=>$itemTimeData){
                  $AA = array_get($itemTimeData, 'AA');
                  $count = array_get($itemTimeData, 'count');

                  $result = $AA / $count;

                  array_set($itemTimeData, 'AA', $result);

                  $timeDatas->put($keyTimeData, $itemTimeData);
                }
                //*** END FOREACH TIMEDATAS ***//
            }
            //*** END FOREACH DAYDATAS ***//
          }
          //*** END FOREACH DATOS ***//
      }
      //*** END FOREACH GRAPHICS ***//

      //*** --------------------------------------------------------------- ***//

      //*** SORTS BY TIME ***//

      //*** INIT FOREACH GRAPHICS ***//
      foreach($table as $keyTable=>$itemTable){
          $datos = array_get($itemTable, 'Datos');
          //*** INIT FOREACH DATOS ***//
          foreach($datos as $keyDato=>$itemDato){
            $dayDatas = array_get($itemDato, 'dayDatas');
            $sortedTime = $dayDatas->sortBy('time');

            array_set($itemDato, 'dayDatas', $sortedTime);
            $datos->put($keyDato, $itemDato);
          }
          
          //*** END FOREACH DATOS ***//
      }
      //*** END FOREACH GRAPHICS ***//

      //*** --------------------------------------------------------------- ***//

      //*** SORTS BY DAY ***//

      //*** INIT FOREACH GRAPHICS ***//
      foreach($table as $keyTable=>$itemTable){
          $datos = array_get($itemTable, 'Datos');
          $sortedDay = $datos->sortBy('day');
          array_set($itemTable, 'Datos', $sortedDay);
          $table->put($keyTable, $itemTable);
          //*** END FOREACH DATOS ***//
        }
        //*** END FOREACH GRAPHICS ***//
        
        //*** --------------------------------------------------------------- ***//
        
        //*** ADD ARRAY DAYS IN ARRAY DAYS ***//
        
        //*** INIT FOREACH GRAPHICS ***//
        foreach($table as $keyTable=>$itemTable){
          
          $days = array_get($itemTable, 'Days');
          
          foreach($helpDias as $keyDias=>$itemDias){
            $days->push($itemDias);
          }
      }
      //*** END FOREACH GRAPHICS ***//    
      
      //*** --------------------------------------------------------------- ***//
      
      //*** ADD ARRAY TIMES IN ARRAY TIMES ***//
      
      $sortedtimes = $helptimes->sort();
      //*** INIT FOREACH GRAPHICS ***//
      foreach($table as $keyTable=>$itemTable){
        
          $times = array_get($itemTable, 'Times');
          
          foreach($sortedtimes as $keyTimes=>$itemTimes){
            $times->push($itemTimes);
          }
        }
        //*** END FOREACH GRAPHICS ***//  
      return $table->toArray();
    //      dd($table);
    }
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
