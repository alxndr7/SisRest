@extends('layouts.master')
@section('content')
        <!-- page content -->
<script>
    function buscarComensal() {

        if (cantMenusTxt.validate() && cantMenusReal.validate() && dniComensalTxt.validate() && dniComensalFor.validate()) {

            $.ajax({
                type: 'get',
                url: '/buscarcomensalcontrol',
                data: {
                    'dniComensal': $('input[name=dniComensal]').val(),
                    'cantmenus': $('input[name=cantMenus]').val()
                },
                success: function (data) {
                    //alert(data);
                    $('#actualizarTabla').html(data);

                },

            });
        }
    }

    function deshacerIngreso(url, cod) {
        //alert(url + ' /' + cod);
        $.ajax({
            type: 'get',
            url: url,
            data: {
                'ncoddetcom': cod
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
                        <div class="col-md-7">
                            <h2>Control de Comensales</h2>
                        </div>
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">Cantidad: </label>

                        <div class="col-md-1 col-sm-9 col-xs-12">
                               <span id="cantMenus">
                            <input type="text" class="form-control" name="cantMenus" id="cantMenus"
                                   placeholder="Cantidad"
                                   value="1">
                                   <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                                    <span class="textfieldInvalidFormatMsg">Formato invalido.</span>
                                    <span class="textfieldMinValueMsg">Mínimo valor es 1</span>
                               </span>
                        </div>
                        <div class="col-md-3">

                            <div class="input-group">
                                <span id="dniComensal">
                                <input type="text" class="form-control" name="dniComensal"
                                       placeholder="Ingresar DNI" maxlength="8">
                                     <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                                    <span class="textfieldInvalidFormatMsg">Formato invalido.</span>
                               </span>
                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-primary" onclick="buscarComensal();">
                                                  <i class="fa fa-cutlery"></i></button>
                                          </span>

                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="actualizarTabla">
                        <div id="respuesta">

                        </div>
                        <div class="x_content">
                            <div class="x_content">


                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nombre Completo</th>
                                        <th>DNI</th>
                                        <th>Fecha</th>
                                        <th>Cantidad</th>
                                        <th>Restante</th>
                                        <th>Deshacer</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($ultimosconsumos as $consumos)
                                        <tr>
                                            <td>{{ $consumos->cNomCom }} {{ $consumos->cApeCom }}</td>
                                            <td>{{ $consumos->cDniCom }}</td>
                                            <td>{{ $consumos->dFecDet }}</td>
                                            <td>{{ $consumos->nCantMenu }}</td>
                                            <td>{{ $consumos->nNuevoNumMenu }}</td>
                                            <td><a href="#"
                                                   onclick="deshacerIngreso('/control/deshaceringreso',{{ $consumos->nCodDetCom }});"
                                                   class="recargar_link btn btn-danger btn-xs"><i
                                                            class="fa fa-trash-o"></i>
                                                    Deshacer
                                                </a></td>
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