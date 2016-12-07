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
       $login = \DB::select('call validarLoginAndroid(?,?)',array($req->usu,$req->passw));
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

    public function crearUsuario(Request $req){

        // dd($req->usu);
        $insert = \DB::select('call crearUsuariosAndroid(?,?,?,?)',array($req->cNomUsu,$req->cLoginUsu,$req->cPasswUsu,$req->cDni));
        //$ultimosPagos = \DB::select('call ultimosPagosPorDniAndroid(?)',array($req->dni));
        return response()->json(['respuesta'=>$insert]);
        // return response()->json($ultimosConsumos);
    }

}
