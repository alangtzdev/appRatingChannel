<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportDatosController extends Controller
{
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

}
