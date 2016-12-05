@extends('layouts.master')
@section('content')
        <!-- page content -->

<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="col-md-9">
                        <h2>Mantenimiento de Comensales</h2>
                        </div>
                        <div class="col-md-3">
                        <div class="btn-group">
                            <a style="cursor:pointer" class="recargar_nuevo btn btn-sm btn-primary"
                               href="comensales/nuevo"><span class="glyphicon glyphicon-plus"></span>&nbsp;Nuevo
                                Comensal</a>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="x_content">

                            <div id="actualizarTabla">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Documento</th>
                                        <th>Telefono</th>
                                        <th>Num. Menus</th>
                                        <th style="width: 25%">Opciones</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($listcomensales as $comensales)
                                        <tr>
                                            <td>{{ $comensales->cNomCom }}</td>
                                            <td>{{ $comensales->cApeCom }}</td>
                                            <td>{{ $comensales->cDniCom }}</td>
                                            <td>{{ $comensales->cTelCom }}</td>
                                            <td>{{ $comensales->nNumMenuCom }}</td>
                                            <td>
                                                <a href="comensales/ver" class="recargar_link btn btn-primary btn-xs"><i class="fa fa-folder"></i>
                                                    View
                                                </a>

                                                <a href="#" onclick="openModal('comensales/editar',{{$comensales->nCodCom}});" class="recargar_link btn btn-info btn-xs"><i class="fa fa-pencil"></i>
                                                    Editar </a>
                                                <a href="#" onclick="openModal('comensales/eliminar',{{$comensales->nCodCom}});" class="recargar_link btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
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