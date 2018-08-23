<?php

namespace App\Http\Controllers;
use Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Transmition;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Routing\ResponseFactory;
use Carbon\Carbon;

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
                                               'AVGpercentViewed' => array_get($flattened, 'avgpercentview'),
                                               'HH' => array_get($flattened, 'hh'),
                                               'AA' => array_get($flattened, 'aa'),
                                               'totalHoursViewed' => array_get($flattened, 'totalhoursviewed')
                                            ]);

            //echo implode("\n OK",$arrTransmition);
            //dd($arrTransmition);
         }
         dd($arrTransmition);

         if(!empty($arrTransmition)){
            //DB::table('Transmitions')->insert($arrTransmition);
            $transmitions = Transmition::create($arrTransmition);
            $transmitions->save();
            // $insertValidate = Transmition::insert($arrTransmition);
            // if($insertValidate->fails()){
            //     return back()->with('erro', 'Insert Record successfully.', $arrTransmition);
            // }

         }
      }

      return back()->with('success', 'Insert Record successfully.');
      // FIXME: BORRAR CODIGO DESPUES DE REVISARLO
      // $archivo = $request->file('archivo');
      // $nomOriginal=$archivo->getClientOriginalName();
      // $extension=$archivo->getClienteOriginalExtension();
      // $rl=Storage::disk('archivos')->put($nomOriginal, \File::get($archivo) );
      // $ruta = storage_path('archivos') ."/". $nomOriginal;

      // if ($rl) {
      //     $ct=0;
      //     Excel::selectSheetsByIndex(0)->load($ruta, function($hoja){

      //         $hoja->each(function($fila) {
      //             $transmition = new Transmition;
      //             $transmition->id_Program = $fila->id_Program;
      //             $transmition->id_TypeTransmition = $fila->id_TypeTransmition;
      //             $transmition->day = $fila->day;
      //             $transmition->nationalTime = $fila->nationalTime;
      //             $transmition->runTime = $fila->runTime;
      //             $transmition->RTG = $fila->RTG;
      //             $transmition->SH = $fila->SH;
      //             $transmition->percentReach = $fila->percentReach;
      //             $transmition->AVGpercentViewed = $fila->AVGpercentViewed;
      //             $transmition->HH = $fila->HH;
      //             $transmition->AA = $fila->AA;
      //             $transmition->totalHoursViewed = $fila->totalHoursViewed;
      //             $transmition->save();
      //         });

      //         return 
      //         view('view.name')->with('msj', 'Excel cargador correctamente');

      //     });
      // }
      // return view('view.error')->with('msj', 'Error al importar archivo');

   }
   //////////////////////////
   public function importFile(Request $request){

      if($request->hasFile('sample_file')){

         $path = $request->file('sample_file')->getRealPath();

         $data = \Excel::load($path)->get();

         if($data->count()){

            foreach ($data as $key => $value) {

               $arr[] = ['title' => $value->title, 'body' => $value->body];

            }

            if(!empty($arr)){

               DB::table('products')->insert($arr);

               dd('Insert Recorded successfully.');

            }

         }

      }

      dd('Request data does not have any files to import.');      

   }

}
