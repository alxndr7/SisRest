<div id="respuesta">
    @if($flag == 'azul')
        <div class="alert alert-info alert-dismissible fade in" role="alert" style="text-align: center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
            </button>
            <strong>{{$respuesta}}!</strong>
        </div>
    @elseif($flag == 'naranja')
        <div class="alert alert-warning alert-dismissible fade in" role="alert" style="text-align: center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
            </button>
            <strong>{{$respuesta}}!</strong>
        </div>
    @elseif($flag == 'rojo')
        <div class="alert alert-danger alert-dismissible fade in" role="alert" style="text-align: center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
            </button>
            <strong>{{$respuesta}}!</strong>
        </div>
    @elseif($flag == 'verde')
        <div class="alert alert-success alert-dismissible fade in" role="alert" style="text-align: center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span>
            </button>
            <strong>{{$respuesta}}!</strong>
        </div>
    @endif
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

<script>
    setTimeout(function() {
        $("#respuesta").fadeOut(1500);
    },1500);
</script>