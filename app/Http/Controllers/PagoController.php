<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mcomensales;

class PagoController extends Controller
{
    //
    public function index()
    {
        $ultimosPagos = \DB::select('call ultimosPagos()');
        return view('/pago/pagos')->with([
                'ultimospagos' => $ultimosPagos]
        );
    }

    public function buscarcomensalpordni(Request $req)
    {

        $comensal = \DB::select('call buscarcomensalpordni(?)', array($req->dniComensal));

        if ($comensal)
            $Respuesta = 'Se actualizó satisfactoriamente.';
        else
            $Respuesta = 'El DNI ingresado no se encuentra registrado.';

        //dd($Respuesta);
        return view('pago/cargarinfocomensal')->with([
                'comensal' => $comensal,
                'respuesta' => $Respuesta]
        );
    }

    public function agregarpago(Request $req)
    {

        $ultimospagos = \DB::select('call agregarpago(?,?,?)', array($req->ncodcom, $req->fpagocom, $req->ncantmenu));
        if ($ultimospagos)
            $Respuesta = 'Se actualizó satisfactoriamente.';
        else
            $Respuesta = 'Hubo un error al actualizar.';

        return view('/pago/listpagos')->with([
                'respuesta' => $Respuesta,
                'ultimospagos' => $ultimospagos]
        );

    }

    public function mEditarPago(Request $req)
    {
        //dd($req->ncodcom);
        $pago = \DB::select('call pagoPorId(?)', array($req->ncodpago));
        //dd($comensal);
        return view('pago/editarpago')->with(['pago' => $pago]);

    }

    public function mEliminarPago(Request $req)
    {
        return view('pago/eliminarpago')->with([
                'ncodpago' => $req->ncodpago]
        );
    }

    public function eliminarPago(Request $req){

        $ultimosConsumos = \DB::select('call eliminarPago(?)',array($req->ncodpago));
        //$comensales = mcomensales::all();
        if($ultimosConsumos){
            $Respuesta = 'Se eliminó satisfactoriamente el pago.';
        }

        else{
            $Respuesta = 'Hubo un error al eliminar pago.';
        }


        return view('pago/listpagos')->with([
                'respuesta' =>$Respuesta,
                'ultimospagos' =>$ultimosConsumos ]
        );
    }

    public function editarPago(Request $req)
    {

        $ultimospagos = \DB::select('call editarPago(?,?,?)', array($req->ncodpago, $req->ncantmenu, $req->fpagocom));
        //$comensales = mcomensales::all();
        //dd($ultimospagos);
        if ($ultimospagos)
            $Respuesta = 'Se actualizó satisfactoriamente.';
        else
            $Respuesta = 'Hubo un error al actualizar.';

        return view('pago/listpagos')->with([
                'respuesta' => $Respuesta,
                'ultimospagos' => $ultimospagos]
        );
    }


}
