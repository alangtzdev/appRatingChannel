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

  //  public function imp_ortarDatosExcel__(Request $request){
  //    $request->validate(['fileTransmition'=>'required']);
     
  //    $path = $request->file('fileTransmition')->getRealPath();
  //    $data = Excel::load($path, function($reader) {$reader->ignoreEmpty();})->get();
  //     if(!empty($data) && $data->count()){
  //       foreach ($data->toArray() as $key => $row) 
  //     {
  //       $id_program_= DB::table('Programs')->where($this->eliminar_simbolos("name"),$this->eliminar_simbolos($row['id_program']))->value('id_Program');
  //       // $id_program_= DB::table('Programs')->where('name',$row['id_program'])->value('id_Program'); 
  //       $id_typetransmition_= DB::table('TypeTransmition')->where("nameTransmition",$row['id_typetransmition'])->value('id_TypeTransmition');
  //       if ($id_program_ == NULL  || $id_program_ == 0) {
  //         //dd($row['id_program']);
  //         Program::create([
  //           'id_Gender'=>1,
  //           'name'=>$row['id_program'],
  //           'description'=>''
  //         ]);
  //       } else {
  //         // dd($row,$id_program_);
         
  //         }     
  //       }//each
  //      foreach ($data->toArray() as $key => $row) 
  //     {
  //       //$id_program_= DB::table('Programs')->select('id_Program')->where("name","=",$row['id_program'])->first()->id_Program;
  //       // $id_program_= DB::table('Programs')->where('name',$row['id_program'])->value('id_Program'); 
  //       $id_program_= DB::table('Programs')->where($this->eliminar_simbolos("name"),$this->eliminar_simbolos($row['id_program']))->value('id_Program'); 
  //       $id_typetransmition_= DB::table('TypeTransmition')->where("nameTransmition",$row['id_typetransmition'])->value('id_TypeTransmition');
  //       if ($id_program_ && $id_typetransmition_) {
  //         $insert[] = [
  //           'id_Program' => $id_program_,
  //           'id_TypeTransmition' => $id_typetransmition_,
  //           'day' => $row['day'],
  //           'nationalTime' => $row['nationaltime'],
  //           'runTime' => $row['runtime'],
  //           'RTG' => $row['rtg'],
  //           'SH' => $row['sh'],
  //           'percentReach' => $row['percentreach'],
  //           'AVGpercentViewed' => $row['avgpercentviewed'],
  //           'HH' => $row['hh'],
  //           'AA' =>  $row['aa'],
  //           'totalHoursViewed' => $row['totalhoursviewed'],
  //           'created_at' =>  Carbon::today()
  //           ]; 
  //       } else {
  //         dd($row,$row['id_program'],$id_program_);
  //         return back()->with('error', 'Error no existe "'.$row['id_program'].'" en nuestra base de datos');
  //         return back();
  //           # code...
  //         }     
  //       }//each
  //       if(!empty($insert)){
  //             $insertData = DB::table('Transmitions')->insert($insert);
  //       return back()->with('success', 'Sus datos se importaron con éxito');
  //       }else {                        
  //       return back()->with('error', 'Error al insertar los datos ...');
  //       return back();
  //       }
       
       
  //     } else{
  //       return back()->with('error', 'Error al importar archivo');
  //     }

      
   
  //  }
   
   protected function eliminar_simbolos($string){
 
    $string = trim($string);
    
 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
 
    $string = str_replace(
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),' ',
        $string
    );
    $string = str_replace(' ', '',$string);

   return strtoupper($string);
  } 
 
  public function importarDatosExcel(Request $request){
    $request->validate(['fileTransmition'=>'required']);
    $path = $request->file('fileTransmition')->getRealPath();
    $data = Excel::load($path, function($reader) {$reader->ignoreEmpty();})->get();

    $arrData = $data->toArray();
    $insert = collect([]);        
    $idNewProgram = 0;

     if(!empty($data) && $data->count()){
       foreach ($arrData as $key => $row) 
       {
        //  $namePrograma_= DB::table('Programs')->whereRaw($this->eliminar_simbolos("name"),$this->eliminar_simbolos($row['id_program']))->value('id_Program');         
         $id_program_ = DB::table('Programs')->whereRaw($this->eliminar_simbolos("name"),$this->eliminar_simbolos($row['id_program']))->value('id_Program');
         $id_typetransmition_= DB::table('TypeTransmition')->where("nameTransmition",$row['id_typetransmition'])->value('id_TypeTransmition');
        //  dd($this->eliminar_simbolos($row['id_program']),$namePrograma_);
        if (!is_null($id_program_)  || $id_program_ != 0 || !empty($id_program_)) {
          $idNewProgram = $id_program_;
          //dd($idNewProgram);
         } else {
        $idNewProgram = DB::table('Programs')->insertGetId(
          ['id_Gender'=>1,
          'name'=>$row['id_program'],
          'description'=>'']);
          // dd($row, $idNewProgram);
         }
        //  dd($idNewProgram);
         $insert->prepend([
          'id_Program' => $idNewProgram,
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
          ]); 
        
       }//end-->each

       if(!empty($insert)){
             $insertData = DB::table('Transmitions')->insert($insert->toArray());
       return back()->with('success', 'Sus datos se importaron con éxito');
       }else {                        
       return back()->with('error', 'Error al insertar los datos ...');
       return back();
       }
      
      
     } else{
       return back()->with('error', 'Error al importar archivo');
     }

     
  
  }


}
