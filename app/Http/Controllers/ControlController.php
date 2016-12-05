<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mcomensales;

class ControlController extends Controller
{
    //
    public function index()
    {
        $ultimosConsumos = \DB::select('call ultimosComsumos()');
        return view('/control/control')->with([
                'ultimosconsumos' => $ultimosConsumos]
        );
    }

    public function buscarcomensalcontrol(Request $req)
    {

        $comensal = \DB::select('call buscarcomensalpordni(?)', array($req->dniComensal));
        $flag = 'azul';

        if ($comensal) {
            if ($comensal[0]->nNumMenuCom < 1) {
                $flag = 'naranja';
                $Respuesta = 'El usuario ya no cuenta con Menus disponibles.';
                $ultimosConsumos = \DB::select('call ultimosComsumos()');
                return view('control/listControl')->with([
                        'ultimosconsumos' => $ultimosConsumos,
                        'flag' => $flag,
                        'respuesta' => $Respuesta]
                );
            } else {
                $flag = 'azul';
                $updatemenuscom = \DB::select('call updateMenuComensal(?,?,?)', array($comensal[0]->nCodCom, $req->cantmenus,$comensal[0]->nNumMenuCom));

                if ($updatemenuscom) {
                    $Respuesta = 'Se descontó ' . $req->cantmenus . ' menu(s) satisfactoriamente.';
                    return view('control/listControl')->with([
                            'ultimosconsumos' => $updatemenuscom,
                            'flag' => $flag,
                            'respuesta' => $Respuesta]
                    );
                } else {
                    $Respuesta = 'Error al realizar operación.';
                    $flag = 'rojo';
                    $ultimosConsumos = \DB::select('call ultimosComsumos()');
                    return view('control/listControl')->with([
                            'ultimosconsumos' => $ultimosConsumos,
                            'flag' => $flag,
                            'respuesta' => $Respuesta]
                    );
                }
            }
        } else {
            $Respuesta = 'El DNI ingresado no se encuentra registrado.';
            $flag = 'rojo';
            $ultimosConsumos = \DB::select('call ultimosComsumos()');
            return view('control/listControl')->with([
                    'ultimosconsumos' => $ultimosConsumos,
                    'flag' => $flag,
                    'respuesta' => $Respuesta]
            );

        }

    }

    public function mdeshacerIngreso(Request $req)
    {
        return view('control/deshacerIngreso')->with([
                'ncoddetcom' => $req->ncoddetcom]
        );
    }

    public function deshacerIngreso(Request $req) {
        $flag = '';
        $consumos = \DB::select('call eliminarIngreso(?)',array($req->ncoddetcom));
        //$comensales = mcomensales::all();
        if($consumos){
            $flag = 'verde';
            $Respuesta = 'Se eliminó satisfactoriamente el ingreso.';
        }

        else{
            $flag = 'rojo';
            $Respuesta = 'Hubo un error al eliminar ingreso.';
        }


        return view('control/listcomensales')->with([
                'respuesta' =>$Respuesta,
                'flag' => $flag,
                'ultimosconsumos' =>$consumos ]
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
                'ultimospagos' => $ultimospagos]
        );

    }

    public function updatecomensal(Request $req)
    {
        $comensales = \DB::select('call updateComensal(?,?,?,?,?,?,?)',
            array($req->ncodcom, $req->cnomcom, $req->capecom, $req->cdnicom, $req->ctelcom, $req->cclavcom, $req->nnummenucom));
        //$comensales = mcomensales::all();
        //dd($comensales);
        if ($comensales)
            $Respuesta = 'Se actualizó satisfactoriamente.';
        else
            $Respuesta = 'Hubo un error al actualizar.';

        return view('comensal/listcomensales')->with([
                'respuesta' => $Respuesta,
                'listcomensales' => $comensales]
        );
    }


}
