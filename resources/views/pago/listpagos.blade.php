<div class="row">
    <div class="col-md-4 text-center"></div>
    <div class="col-md-4 text-center" id="respuesta">
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
            </button>
            <strong id="textRespuesta">{{$respuesta}}</strong>
        </div>
    </div>
    <div class="col-md-4 text-center"></div>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th>Nombre Completo</th>
        <th>DNI</th>
        <th>Último</th>
        <th>Menus</th>
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

<script>
    $('#datatable').dataTable();
    setTimeout(function() {
        $("#respuesta").fadeOut(1500);
    },1500);
</script>