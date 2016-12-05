<script>
    // add function
    $("#editarPago").click(function () {

        //alert($('input[name=ncodpago]').val() + '/' + $('input[name=ncantmenu]').val() + '/' + $('input[name=fpagocom]').val());
        if (encantmenuTxt.validate() && encantmenuReal.validate()  && efpagocomTxt.validate() && efpagocomReal.validate()) {
            $.ajax({
                type: 'get',
                url: '/editarpago',
                data: {
                    'ncodpago': $('input[name=ncodpago]').val(),
                    'ncantmenu': $('input[name=ncantmenu]').val(),
                    'fpagocom': $('input[name=fpagocom]').val()
                },
                success: function (data) {
                    //alert(data);
                    $('#actualizarTabla').html(data);
                },

            });
            $('#myModal').modal('hide');

        }

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
            <h4 class="modal-title" id="myModalLabel2">Editar Comensal</h4>
        </div>
        <input class="hidden" name="ncodpago" value="{{$pago[0]->nCodPago}}">

        <div class="modal-body">

            <div class="row">
                <div class="col-md-6">
                    <label for="nombre" class="control-label">Nombre(s)</label>
                </div>
                <div class="col-md-6">
                    <label for="apellido" class="control-label">Apellidos</label>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                                <span id="cnomcom">
                                <input id="cnomcom" type="text" class="form-control" name="cnomcom"
                                       value="{{$pago[0]->cNomCom}}" readonly>
                                <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                                    </span>
                </div>
                <div class="col-md-6">

                         <span id="capecom">
                        <input id="capecom" type="text" class="form-control" name="capecom"
                               value="{{$pago[0]->cApeCom}}" readonly>
                              <span class="textfieldRequiredMsg">Campo obligatorio.</span>
     </span>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="nombre" class="control-label">Documento</label>
                </div>
                <div class="col-md-6">
                    <label for="apellido" class="control-label">Fecha</label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <span id="cdnicom">
                        <input id="cdnicom" type="text" class="form-control" name="cdnicom"
                               value="{{ $pago[0]->cDniCom }}" readonly>
                     <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                     <span class="textfieldInvalidFormatMsg">Formato invalido.</span>
                    </span>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <span id="dfecpago">
                        <input id="dfecpago" type="text" class="form-control" name="dfecpago"
                               value="{{ $pago[0]->dFecPago }}" readonly>
                            <span class="textfieldInvalidFormatMsg">Formato invalido.</span>
                        </span>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <label for="apellido" class="control-label">#Menus</label>
                </div>
                <div class="col-md-6">
                    <label for="apellido" class="control-label">Pago</label>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                         <span id="ncantmenu">
                        <input id="ncantmenu" type="text" class="form-control"
                               name="ncantmenu"
                               value="{{$pago[0]->nCantMenu}}" autofocus>
                             <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                             <span class="textfieldInvalidFormatMsg">Formato invalido.</span>
                         </span>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <span id="fpagocom">
                        <input id="fpagocom" type="text" class="form-control"
                               name="fpagocom"
                               value="{{$pago[0]->fPagoCom}}">
                              <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                             <span class="textfieldInvalidFormatMsg">Formato invalido.</span>
                        </span>
                    </div>
                </div>

            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar
                <i class="fa fa-close"></i>
            </button>
            <button class="btn btn-primary" type="submit" id="editarPago">
                Editar <i class="fa fa-file-text"></i>
            </button>
            <!-- <button type="submit" class="btn btn-primary">Save changes</button>-->
        </div>
    </div>
</div>

<!--
</form>
fin modal-->


<script type="text/javascript">
    <!--

    var encantmenuTxt = new Spry.Widget.ValidationTextField("ncantmenu", 'none', {validateOn: ['change']});
    var encantmenuReal = new Spry.Widget.ValidationTextField("ncantmenu", 'real', {validateOn: ['change']});
    var efpagocomTxt = new Spry.Widget.ValidationTextField("fpagocom", 'none', {validateOn: ['change']});
    var efpagocomReal = new Spry.Widget.ValidationTextField("fpagocom", 'real', {validateOn: ['change']});
    //-->
</script>