<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class serviceAndroid extends Controller
{
    public function serviceObtenerConsumos(){

        $ultimosConsumos = \DB::select('call ultimosComsumos()');
        return response()->json($ultimosConsumos);
    }

    public function validarLogin(Request $req){

       // dd($req->usu);
       $login = \DB::select('call validarLogin(?,?)',array($req->usu,$req->passw));
        return response()->json(['usuario'=>$login]);
       // return response()->json($ultimosConsumos);
    }

    public function ultimosConsumosPorDni(Request $req){

        // dd($req->usu);
        $ultimosConsumos = \DB::select('call ultimosConsumosPorDniAndroid(?)',array($req->dni));
        $ultimosPagos = \DB::select('call ultimosPagosPorDniAndroid(?)',array($req->dni));
        return response()->json(['ultimosconsumos'=>$ultimosConsumos, 'ultimosPagos'=>$ultimosPagos]);
        // return response()->json($ultimosConsumos);
    }

}
