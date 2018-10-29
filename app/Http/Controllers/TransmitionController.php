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

         $helpDiasInt = [ 0 => 1, 1 => 2, 2 => 3, 3 => 4, 4 => 5, 5 => 6, 6 => 0 ];
         $helpDias = [ 0 => 'Lunes', 1 => 'Martes', 2 => 'Miercoles', 3 => 'Jueves', 4 => 'Viernes', 5 => 'Sábado', 6 => 'Domingo' ];

         foreach($transmitions as $transmition){
            $dayParse = Carbon::parse($transmition->day);

            $_dayString = '';
            $_dayInt = '';
            
            foreach($helpDiasInt as $keyDayInt=>$itemDayInt){
              if($itemDayInt == $dayParse->dayOfWeek){
                $_dayInt = $keyDayInt;

                foreach($helpDias as $keyDayString=>$itemDayString){
                  if($keyDayString == $_dayInt){
                  $_dayString =  $itemDayString;
                  }
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
                              if($keyData == $_dayInt){

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
                              if($keyCount == $_dayInt){

                                 $itemCount += 1;
                                 $counts->put($keyCount, $itemCount);

                              }
                              //*** END IF DAY-COUNT ***//

                              break;
                           }
                           //*** END FOREACH COUNT ***//

                           //*** INIT FOREACH DAYS ***//
                           foreach($days as $keyDay=>$itemDay){
                              $days->push(''.$_dayInt.': '.$transmition->day.' - '.$transmition->program_name.'');

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
                           $_dayInt => $transmition->AA
                        ]),
                        'data' => collect([]),
                        'backgroundColor' => 'rgba(54, 162, 235, 1)',
                        'counts' => collect([
                           $_dayInt => 1
                        ]),
                        'days' => collect([
                           ''.$_dayInt.': '.$transmition->day.' - '.$transmition->program_name.''
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
                           $_dayInt => $transmition->AA
                        ]),
                        'data' => collect([]),
                        'backgroundColor' => 'rgba(54, 162, 235, 1)',
                        'counts' => collect([
                           $_dayInt => 1
                        ]),
                        'days' => collect([
                           ''.$_dayInt.': '.$transmition->day.' - '.$transmition->program_name.''
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
               $counts = array_get($itemDato, 'counts');
               
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

                  foreach($helpDiasInt as $keyDia=>$itemDia){
                     if($keyData != $itemDia){
                        $Auxdatas->put($itemDia, 0);
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
          
          foreach($helpDias as $keyDias=>$itemDias){
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
      $hour_med_one = Carbon::createFromFormat('H:i', $hours[1])->toTimeString();
      $hour_med_two = Carbon::createFromFormat('H:i', $hours[2])->toTimeString();
      $hour_end = Carbon::createFromFormat('H:i', $hours[3])->toTimeString();

      $firts = DB::table('transmitions')
      ->join('programs', 'transmitions.id_Program', '=', 'programs.id_Program')
      ->join('typetransmition', 'transmitions.id_TypeTransmition', '=', 'typetransmition.id_TypeTransmition')
      ->select('programs.name as program_name', 'transmitions.day', 'transmitions.AA',
                  'transmitions.nationalTime', 'transmitions.runTime')
                  ->whereDate('transmitions.day', '>=', $date_start)
                  ->whereDate('transmitions.day', '<=', $date_end)
                  ->whereTime('transmitions.nationalTime', '>=', $hour_start)
                  ->whereTime('transmitions.nationalTime', '<=', $hour_med_one);
      
      $transmitions = DB::table('transmitions')
      ->join('programs', 'transmitions.id_Program', '=', 'programs.id_Program')
      ->join('typetransmition', 'transmitions.id_TypeTransmition', '=', 'typetransmition.id_TypeTransmition')
      ->select('programs.name as program_name', 'transmitions.day', 'transmitions.AA',
                  'transmitions.nationalTime', 'transmitions.runTime')
                  ->whereDate('transmitions.day', '>=', $date_start)
                  ->whereDate('transmitions.day', '<=', $date_end)
                  ->whereTime('transmitions.nationalTime', '>=', $hour_med_two)
                  ->whereTime('transmitions.nationalTime', '<=', $hour_end)
                  ->union($firts)
                  ->get();
          
      $table = collect([]);
      $programs = collect([]);
      $helptimes = collect([]);
      $helpDiasInt = [ 0 => 1, 1 => 2, 2 => 3, 3 => 4, 4 => 5, 5 => 6, 6 => 0 ];
      $helpDias = [ 0 => 'Lunes', 1 => 'Martes', 2 => 'Miercoles', 3 => 'Jueves', 4 => 'Viernes', 5 => 'Sábado', 6 => 'Domingo' ];
      
      
      foreach($transmitions as $transmition){
        $dayParse = Carbon::parse($transmition->day);
        $_dayString = '';
        $_dayInt = '';
        $time = $transmition->nationalTime;
        
        foreach($helpDiasInt as $keyDayInt=>$itemDayInt){
          if($itemDayInt == $dayParse->dayOfWeek){
            $_dayInt = $keyDayInt;

            foreach($helpDias as $keyDayString=>$itemDayString){
              if($keyDayString == $_dayInt){
               $_dayString =  $itemDayString;
              }
            }
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
                if($datos->contains('day', $_dayInt)){
                  //*** INIT FOREACH DATOS ***//
                  foreach($datos as $keyDato=>$itemDato){
                      $dayInt = array_get($itemDato, 'day');
                      //*** INIT IF DAYINT ***//
                      if($dayInt == $_dayInt){
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
                                    //*** INIT FOREACH TIMEDATAS ***//hy
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
                                        'runTime' => $transmition->runTime,
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
                                    'runTime' => $transmition->runTime,
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
                      'day' => $_dayInt,
                      'dia' => $_dayString,
                      'dayDatas' => collect([
                        [
                            'time' => $time,
                            'timeDatas' => collect([
                              [
                                  'program' => $transmition->program_name,
                                  'AA' => $transmition->AA,
                                  'runTime' => $transmition->runTime,
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
                'MorePrograms' => collect([]),
                'Days' => collect([]),
                'Times' => collect([]),
                'Datos' => collect([
                  [
                      'day' => $_dayInt,
                      'dia' => $_dayString,
                      'dayDatas' => collect([
                        [
                            'time' => $time,
                            'timeDatas' => collect([
                              [
                                  'program' => $transmition->program_name,
                                  'AA' => $transmition->AA,
                                  'runTime' => $transmition->runTime,
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

      //*** ADD PROGRAMS WITH MORE 30MIN IN OTHER ARRAY ***//

      //*** INIT FOREACH GRAPHICS ***//
      foreach($table as $keyTable=>$itemTable){
        $datos = array_get($itemTable, 'Datos');
        //*** INIT FOREACH DATOS ***//
        foreach($datos as $keyDato=>$itemDato){
          $dayInt = array_get($itemDato, 'day');
          $dayString = array_get($itemDato, 'dia');
          $dayDatas = array_get($itemDato, 'dayDatas');
          //*** INIT FOREACH DAYDATAS ***//
          foreach($dayDatas as $keyDayData=>$itemDayData){

            $time = array_get($itemDayData, 'time');
            $timeDatas = array_get($itemDayData, 'timeDatas');
            //*** INIT FOREACH TIMEDATAS ***//
            foreach($timeDatas as $keyTimeData=>$itemTimeData){
              $_runTime = array_get($itemTimeData, 'runTime');
              
              if($_runTime > 30){
                $numRep = ($_runTime / 30) - 1;
                $AA = array_get($itemTimeData, 'AA');
                $count = array_get($itemTimeData, 'count');
                $program = array_get($itemTimeData, 'program');
                
                for($i=1; $i<=$numRep; $i++){
                  $resMin = 30 * $i;
                  $timeParse = Carbon::createFromFormat('H:i:s', $time)->addMinutes($resMin)->toTimeString();
                  array_set($itemTimeData, 'timeRep', $timeParse);

                  $programs->prepend([
                    'day' => $dayInt,
                    'dia' => $dayString,
                    'time' => $timeParse,
                    'program' => $program,
                    'AA' => $AA,
                    'runTime' => $_runTime,
                    'count' => $count
                  ]);
                }
              }
            }
            //*** END FOREACH TIMEDATAS ***//
          }
          //*** END FOREACH DAYDATAS ***//
        }
        //*** END FOREACH DATOS ***//
      }
      //*** END FOREACH GRAPHICS ***//

      //*** --------------------------------------------------------------- ***//

      //*** ADD PROGRAMS IN ARRAY TABLE ***//

      //*** INIT FOREACH GRAPHICS ***//
      foreach($table as $keyTable=>$itemTable){
        $datos = array_get($itemTable, 'Datos');
        //*** INIT FOREACH DATOS ***//
        foreach($datos as $keyDato=>$itemDato){
          //*** INIT FOREACH PROGRAMS ***//
          foreach($programs as $keyPrograms=>$itemPrograms){

            $dayIntProgram = array_get($itemPrograms, 'day');
            $dayStringProgram = array_get($itemPrograms, 'dia');
            $timeProgram = array_get($itemPrograms, 'time');
            $programProgram = array_get($itemPrograms, 'program');
            $runTimeProgram = array_get($itemPrograms, 'runTime');
            $AAProgram = array_get($itemPrograms, 'AA');
            $countProgram = array_get($itemPrograms, 'count');

            $dayIntTable = array_get($itemDato, 'day');
            $dayStringTable = array_get($itemDato, 'dia');
            $dayDatasTable = array_get($itemDato, 'dayDatas');
            //*** INIT IF DAYINTPROGRAM EQUAL DAYINTTABLE ***//
            if($dayIntProgram == $dayIntTable){
              //*** INIT IF DAYDATAS ***//
              if($dayDatasTable->contains('time', $timeProgram)){
                //*** INIT FOREACH DAYDATAS ***//
                foreach($dayDatasTable as $keyDayData=>$itemDayData){
                  $timeTable = array_get($itemDayData, 'time');
                
                  //*** INIT IF TIMEPROGRAM EQUAL TIMETABLE ***//
                  if($timeProgram == $timeTable){
                    $timeDatasTable = array_get($itemDayData, 'timeDatas');

                    $timeDatasTable->push([
                      'program' => $programProgram,
                      'AA' => $AAProgram,
                      'runTime' => $runTimeProgram,
                      'count' => $countProgram
                    ]);
                    //*** END FOREACH TIMEDATAS ***//
                  }
                  //*** END IF TIMEPROGRAM EQUAL TIMETABLE ***//
                }
                //*** END FOREACH DAYDATAS ***//
              }
              else{
                if(!$helptimes->contains($timeProgram)){
                  $helptimes->push($timeProgram);
                }
                $dayDatasTable->push([
                  'time' => $timeProgram,
                  'timeDatas' => collect([
                    [
                      'program' => $programProgram,
                      'AA' => $AAProgram,
                      'runTime' => $runTimeProgram,
                      'count' => $countProgram
                    ]
                  ])
                ]);
              }
              //*** INIT IF DAYINTPROGRAM EQUAL DAYINTTABLE ***//
            }
            //*** END IF DAYINTPROGRAM EQUAL DAYINTTABLE ***//
          }
          //*** END FOREACH PROGRAMS ***//
        }
        //*** END FOREACH DATOS ***//
      }
      //*** END FOREACH GRAPHICS ***//

      //*** --------------------------------------------------------------- ***//

      //*** ADD ARRAY PROGRAMS IN ARRAY MOREPROGRAMS ***//
        
        //*** INIT FOREACH GRAPHICS ***//
        foreach($table as $keyTable=>$itemTable){
          
          $morePrograms = array_get($itemTable, 'MorePrograms');
          
          foreach($programs as $keyPrograms=>$itemPrograms){
            $morePrograms->push($itemPrograms);
          }
      }
      //*** END FOREACH GRAPHICS ***//    

      //*** --------------------------------------------------------------- ***//

      //*** SORTS BY TIME ***//

      // //*** INIT FOREACH GRAPHICS ***//
      // foreach($table as $keyTable=>$itemTable){
      //     $datos = array_get($itemTable, 'Datos');
      //     //*** INIT FOREACH DATOS ***//
      //     foreach($datos as $keyDato=>$itemDato){
      //       $dayDatas = array_get($itemDato, 'dayDatas');
      //       $sortedTime = $dayDatas->sortBy('time');

      //       array_set($itemDato, 'dayDatas', $sortedTime);
      //       $datos->put($keyDato, $itemDato);
      //     }
          
      //     //*** END FOREACH DATOS ***//
      // }
      // //*** END FOREACH GRAPHICS ***//

      //*** --------------------------------------------------------------- ***//

      //*** SORTS BY DAY ***//

      // //*** INIT FOREACH GRAPHICS ***//
      // foreach($table as $keyTable=>$itemTable){
      //     $datos = array_get($itemTable, 'Datos');
      //     $sortedDay = $datos->sortBy('day');
      //     array_set($itemTable, 'Datos', $sortedDay);
      //     $table->put($keyTable, $itemTable);
      //     //*** END FOREACH DATOS ***//
      //   }
      //   //*** END FOREACH GRAPHICS ***//
        
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
