<script>
    // delete function
    $("#eliminarpago").click(function () {
        //alert($('input[name=_token]').val() + ' / ' + $('input[name=ncodcom]').val() );
        $.ajax({
            type: 'get',
            url: '/eliminarpago',
            data: {
                'ncodpago': $('input[name=ncodpago]').val()
            },
            success: function (data) {
                //alert(data);
                $('#actualizarTabla').html(data);

            },

        });
        $('#myModal').modal('hide');
    });


</script>

<!-- Modal Nuevo Comensal
<form class="form-horizontal" role="form" method="POST" action="{{ url('/comensales') }}">-->
{{ csrf_field() }}

<div class="modal-dialog">
    <div class="modal-content load_modal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Eliminar Comensal</h4>
        </div>
        <div class="modal-body">

            <input class="hidden" name="ncodpago" value="{{$ncodpago}}">
            <div class="deleteContent">
                Desea deshacer este ingreso? <span class="title"></span> ?
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar
                <i class="fa fa-close"></i>
            </button>
            <button class="btn btn-danger" type="submit" id="eliminarpago">
                Eliminar <i class="fa fa-trash"></i>
            </button>
            <!-- <button type="submit" class="btn btn-primary">Save changes</button>-->
        </div>
    </div>
</div>

<!--
</form>
fin modal-->

