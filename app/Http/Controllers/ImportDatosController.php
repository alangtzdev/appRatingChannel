<?php

namespace App\Http\Controllers;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Transmition;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Routing\ResponseFactory;
use App\Models\{Program};
use Carbon\Carbon;
use Session;
class ImportDatosController extends Controller
{
   private $excel;
   public function __construct(Excel $excel)
   {
      $this->excel = $excel;
   }
   // getImportData
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function getImportData()
   {
      return view('layout.datos.importData');
   }

   public function importarDatosExcel(Request $request){
     $request->validate(['fileTransmition'=>'required']);
     
     $path = $request->file('fileTransmition')->getRealPath();
     $data = Excel::load($path, function($reader) {})->get();
      if(!empty($data) && $data->count()){
        foreach ($data->toArray() as $key => $row) 
      {
        //$id_program_= DB::table('Programs')->select('id_Program')->where("name","=",$row['id_program'])->first()->id_Program;
        $id_program_= DB::table('Programs')->where('name',$row['id_program'])->value('id_Program'); 
        $id_typetransmition_= DB::table('TypeTransmition')->where("nameTransmition",$row['id_typetransmition'])->value('id_TypeTransmition');
        if (!$id_program_ ) {
          Program::create([
            'id_Gender'=>1,
            'name'=>$row['id_program'],
            'description'=>''
          ]);
        } else {
          }     
        }//each
       foreach ($data->toArray() as $key => $row) 
      {
        //$id_program_= DB::table('Programs')->select('id_Program')->where("name","=",$row['id_program'])->first()->id_Program;
        $id_program_= DB::table('Programs')->where('name',$row['id_program'])->value('id_Program'); 
        $id_typetransmition_= DB::table('TypeTransmition')->where("nameTransmition",$row['id_typetransmition'])->value('id_TypeTransmition');
        if ($id_program_ && $id_typetransmition_) {
          $insert[] = [
            'id_Program' => $id_program_,
            'id_TypeTransmition' => $id_typetransmition_,
            'day' => $row['day'],
            'nationalTime' => $row['nationaltime'],
            'runTime' => $row['runtime'],
            'RTG' => $row['rtg'],
            'SH' => $row['sh'],
            'percentReach' => $row['percentreach'],
            'AVGpercentViewed' => $row['avgpercentviewed'],
            'HH' => $row['hh'],
            'AA' =>  $row['aa'],
            'totalHoursViewed' => $row['totalhoursviewed'],
            'created_at' =>  Carbon::today()
            ]; 
        } else {
          return back()->with('error', 'Error no existe "'.$row['id_program'].'" en nuestra base de datos');
          return back();
            # code...
          }     
        }//each
        if(!empty($insert)){
              $insertData = DB::table('Transmitions')->insert($insert);
        return back()->with('success', 'Sus datos se importaron con éxito');
        }else {                        
        return back()->with('error', 'Error al insertar los datos ...');
        return back();
        }
       
       
      } else{
        return back()->with('error', 'Error al importar archivo');
      }

      
   
   }

   //////////////////////////
   public function importFile(Request $request){
     // FIXME: OR DELETEME
    $request->validate([
      'fileTransmition' => 'required'
   ]);


   $path = $request->file('fileTransmition')->getRealPath();
   //$data = Excel::load($path)->get();
   $data = \Excel::load($path)->get();
   $parseData = $data->all();  
   $arrTransmition = [];
   //dd($data);
   if($data->count()){
      //dd($parseData);
      foreach ($parseData as $key => $row) {
         $flattened = array_dot($row);

         $id_program = array_get($flattened, 'id_program');
         $id_typetransmition = array_get($flattened, 'id_typetransmition');
         $day = array_get($row, 'day');
         $nationaltime = array_get($flattened, 'nationaltime');
         $runtime = array_get($flattened, 'runtime');
         $rtg = array_get($flattened, 'rtg');
         $sh = array_get($flattened, 'sh');
         $percentreach = array_get($flattened, 'percentreach');
         $avgpercentview = array_get($flattened, 'avgpercentview');
         $hh = array_get($flattened, 'hh');
         $aa = array_get($flattened, 'aa');
         $totalhoursviewed = array_get($flattened, 'totalhoursviewed');
         $arrTransmition = array_prepend($arrTransmition,
                                         [
                                            'id_Program' => (int)array_get($flattened, 'id_program'),
                                            'id_TypeTransmition' => (int)array_get($flattened, 'id_typetransmition'),
                                            'day' => array_get($row, 'day'),
                                            'nationalTime' => $nationaltime,
                                            'runTime' => array_get($flattened, 'runtime'),
                                            'RTG' => array_get($flattened, 'rtg'),
                                            'SH' => array_get($flattened, 'sh'),
                                            'percentReach' => array_get($flattened, 'percentreach'),
                                            'AVGpercentViewed' => array_get($flattened, 'avgpercentviewed'),
                                            'HH' => array_get($flattened, 'hh'),
                                            'AA' => array_get($flattened, 'aa'),
                                            'totalHoursViewed' => array_get($flattened, 'totalhoursviewed')
                                         ]);

         //echo implode("\n OK",$arrTransmition);
         //dd($arrTransmition);
      }
      //         dd($arrTransmition);

      if(!empty($arrTransmition)){
         //DB::table('Transmitions')->insert($arrTransmition);
         $transmitions = Transmition::create($arrTransmition);
         $transmitions->save();
         // $insertValidate = Transmition::insert($arrTransmition);
         // if($insertValidate->fails()){
         //     return back()->with('erro', 'Insert Record successfully.', $arrTransmition);
         // }

         return back()->with('success', 'Insert Record successfully.');
      }
   }

   }

}
