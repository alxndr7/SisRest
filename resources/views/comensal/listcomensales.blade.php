
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


<script>
    $('#datatable').dataTable();
    setTimeout(function() {
        $("#respuesta").fadeOut(1500);
    },1500);
</script>