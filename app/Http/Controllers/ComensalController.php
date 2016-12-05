<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mcomensales;

class ComensalController extends Controller
{
    //
    public function index()
    {
        $Respuesta = "";
        //$comensales = mcomensales::all();
        $comensales = \DB::select('call listarComensales()');
        return view('comensal/comensales')->with([
                'respuesta' => $Respuesta,
                'listcomensales' => $comensales]
        );
    }

    public function nuevo()
    {
        //dd(hola);
        return view('comensal/nuevocomensal')->render();
    }
    public function eliminar(Request $req)
    {
        //dd($ncodcom);
        //dd($req->ncodcom);
        return view('comensal/eliminarcomensal')->with([
                    'ncodcom' => $req->ncodcom]
            );
    }
    public function editar(Request $req)
    {
        //dd($req->ncodcom);
       $comensal = \DB::select('call comensalPorId(?)',array($req->ncodcom));
        //dd($comensal);
        return view('comensal/editarcomensal')->with(['comensal' => $comensal]);
    }

    public function deletecomensal(Request $req) {
        $comensales = \DB::select('call cambiarEstadoComensal(?,?)',array($req->nCodCom,'1002'));
        //$comensales = mcomensales::all();
        if($comensales)
            $Respuesta = 'El comensal a sido dado de baja temporalmente.';
        else
            $Respuesta = 'Hubo un error al dar de baja a comensal.';

        return view('comensal/listcomensales')->with([
                'respuesta' =>$Respuesta,
                'listcomensales' =>$comensales ]
        );
    }

    public function updatecomensal(Request $req) {
        $comensales = \DB::select('call updateComensal(?,?,?,?,?,?,?)',
            array($req->ncodcom,$req->cnomcom,$req->capecom,$req->cdnicom,$req->ctelcom,$req->cclavcom,$req->nnummenucom));
        //$comensales = mcomensales::all();
        //dd($comensales);
        if($comensales)
            $Respuesta = 'Se actualizó satisfactoriamente.';
        else
            $Respuesta = 'Hubo un error al actualizar.';

        return view('comensal/listcomensales')->with([
                'respuesta' =>$Respuesta,
                'listcomensales' =>$comensales ]
        );
    }

    public function store(Request $req){
        $comensales = \DB::select('call nuevoComensal(?,?,?,?,?,?,?,?)',
            array($req->cnomcom,$req->capecom,$req->cdnicom,$req->ctelcom,$req->cclavcom,$req->nnummenucom,'1001',$req->fpagocom));
/*
        $comensal = new mcomensales();
        $comensal->cnomcom = $request->cnomcom;
        $comensal->capecom = $request->capecom;
        $comensal->cdnicom = $request->cdnicom;
        $comensal->ctelcom = $request->ctelcom;
        $comensal->cclavcom = $request->cclavcom;
        $comensal->nnummenucom = $request->nnummenucom;
        $comensal->cestcom = '1001';*/

        if($comensales)
            $Respuesta = 'Se agregó correctamente.';
        else
            $Respuesta = 'Hubo un error al agregar.';

        //$comensales = mcomensales::all();
        //$comensales = \DB::select('call listarComensales()');
        return view('comensal/listcomensales')->with([
                'respuesta' =>$Respuesta,
                'listcomensales' =>$comensales ]
        );
        //$comensal->save();

    }
}
