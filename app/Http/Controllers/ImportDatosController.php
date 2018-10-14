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

        $string = str_replace(
            " ",
            "",
            $string
        );

        return strtoupper($string);
    } 
    
    public function importarDatosExcel(Request $request){
        if($request->ajax()){
            $request->validate(["fileTransmition"=>"required"]);
            $path = $request->file('fileTransmition')->getRealPath();
            $data = Excel::load($path, function($reader) {$reader->ignoreEmpty();})->get();

            $arrData = $data->toArray();
            $insert = collect([]);        
            
            if(!empty($data) && $data->count()){
                foreach ($arrData as $key => $row) 
                {
                    $id_program = 0;
                    $id_typetransmition = 0;

                    $programs = DB::table('Programs')->select('id_Program', 'name')->get();

                    $typetransmitions = DB::table('TypeTransmition')->select('id_TypeTransmition', 'nameTransmition')->get();

                    if(!empty($programs)){
                        foreach($programs as $program){
                            $pTablePrograms = $this->eliminar_simbolos($program->name);
                            $pExcelPrograms = $this->eliminar_simbolos($row['id_program']);

                            if($pTablePrograms == $pExcelPrograms){
                                $id_program = $program->id_Program;
                            }
                        }
                    }

                    if(!empty($typetransmitions)){
                        foreach($typetransmitions as $typetransmition){
                            $pTableTypeTransmitions = $this->eliminar_simbolos($typetransmition->nameTransmition);
                            $pExcelTypeTransmitions = $this->eliminar_simbolos($row['id_typetransmition']);

                            if($pTableTypeTransmitions == $pExcelTypeTransmitions){
                                $id_typetransmition = $typetransmition->id_TypeTransmition;
                            }
                        }
                    }
                
                    if ($id_program == 0) {
                        $id_program = DB::table('Programs')->insertGetId(['id_Gender' => 1, 'name' => $row['id_program'], 'description'=>'']);
                    }

                    if ($id_typetransmition == 0) {
                        $id_typetransmition = DB::table('TypeTransmition')->insertGetId(['nameTransmition' => $row['id_typetransmition']]);
                    }

                    $insert->prepend(
                        [
                            'id_Program' => $id_program,
                            'id_TypeTransmition' => $id_typetransmition,
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
                        ]
                    ); 
                
                }//end-->each

                if(!empty($insert)){
                    $insertData = DB::table('Transmitions')->insert($insert->toArray());
                    return 'Sus datos se importaron con éxito';
                } else {                        
                    return 'Error al insertar los datos.';
                }

            } else {
                return "Error al importar datos.";
            }
        }
    }
}
