@extends('layouts.master')
@section('content')
        <!-- page content -->

<style>
    input:required:invalid, input:focus:invalid {
        /* insert your own styles for invalid form input */
        -moz-box-shadow: black;
    }
</style>

<script>

    function buscarComensal() {

        if (dniComensalTxt.validate() && dniComensalFor.validate()) {
            $.ajax({
                type: 'get',
                url: '/buscarcomensal',
                data: {
                    'dniComensal': $('input[name=dniComensal]').val()
                },
                success: function (data) {
                    //alert(data);
                    $('#cargarinfocomensal').html(data);

                },

            });
        }
    }


    function generarPago() {
        //alert($('input[name=dniComensal]').val());
        if (fpagocomTxt.validate() && fpagocomReal.validate() && ncantmenuText.validate() && ncantmenuReal.validate()) {
            $.ajax({
                type: 'get',
                url: '/agregarpago',
                data: {
                    'ncodcom': $('input[name=ncodcom]').val(),
                    'fpagocom': $('input[name=fpagocom]').val(),
                    'ncantmenu': $('input[name=ncantmenu]').val()
                },
                success: function (data) {
                    document.getElementById('ncodcom').value = 0;
                    document.getElementById('cnomcom').value = '';
                    document.getElementById('cdnicom').value = '';
                    document.getElementById('nnummenucom').value = '';
                    document.getElementById('fpagocom').value = '';
                    document.getElementById('ncantmenu').value = '';
                    $('#actualizarTabla').html(data);

                },

            });
        }
    }

    function accionesPago(url, cod) {
        //alert(url + ' /' + cod);
        $.ajax({
            type: 'get',
            url: url,
            data: {
                'ncodpago': cod
            },
            success: function (data) {
                //alert(data);
                event.preventDefault();
                $('#myModal').modal('show');
                $('#myModal').show().html(data);
            },

        });
    }


</script>

<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="col-md-9">
                            <h2>Pagos</h2>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                  <span id="dniComensal">
                                <input type="text" class="form-control" name="dniComensal"
                                       placeholder="Ingresar DNI a buscar" maxlength="8">
                                       <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                                    <span class="textfieldInvalidFormatMsg">Formato invalido.</span>
                               </span>
                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-primary" onclick="buscarComensal();">
                                                  <i class="fa fa-search"></i></button>
                                          </span>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Información de Comensal</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" id="cargarinfocomensal">


                        </div>
                    </div>
                    <div class="x_content">
                        <div class="x_content">

                            <div id="actualizarTabla">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nombre Completo</th>
                                        <th>DNI</th>
                                        <th>Último</th>
                                        <th>Total</th>
                                        <th>Fecha</th>
                                        <th>Pago</th>
                                        <th style="width: 20%">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($ultimospagos as $pagos)
                                        <tr>
                                            <td>{{ $pagos->cNomCom }} {{ $pagos->cApeCom }}</td>
                                            <td>{{ $pagos->cDniCom }}</td>
                                            <td>{{ $pagos->nCantMenu }}</td>
                                            <td>{{ $pagos->nNumMenuCom }}</td>
                                            <td>{{ $pagos->dFecPago }}</td>
                                            <td>{{ $pagos->fPagoCom }}</td>
                                            <td>
                                                <a href="#" onclick="accionesPago('/meditarpago',{{$pagos->nCodPago}});" class="recargar_link btn btn-info btn-xs"><i class="fa fa-pencil"></i>
                                                    Editar </a>
                                                <a href="#" onclick="accionesPago('/meliminarpago',{{$pagos->nCodPago}});" class="recargar_link btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
                                                    Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="myModal" role="dialog">
</div>


@endsection