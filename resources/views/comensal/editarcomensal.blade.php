<script>
    // add function
    $("#edit").click(function () {

        if (ecnomcomTxt.validate() && ecapecomTxt.validate() && ecdnicomTxt.validate() && ecdnicomReal.validate() && ectelcomReal.validate() &&
                ecclavcomText.validate() && ennummenucomTxt.validate() && ennummenucomReal.validate() && efpagocomTxt.validate() && efpagocomReal.validate()) {
            $.ajax({
                type: 'post',
                url: '/comensalesupdate',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'ncodcom': $('input[name=ncodcom]').val(),
                    'cnomcom': $('input[name=cnomcom]').val(),
                    'capecom': $('input[name=capecom]').val(),
                    'cdnicom': $('input[name=cdnicom]').val(),
                    'ctelcom': $('input[name=ctelcom]').val(),
                    'cclavcom': $('input[name=cclavcom]').val(),
                    'nnummenucom': $('input[name=nnummenucom]').val()
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
        <input class="hidden" name="ncodcom" value="{{$comensal[0]->nCodCom}}">

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
                    <div class="form-group{{ $errors->has('cnomcom') ? ' has-error' : '' }}">

                                <span id="cnomcom">
                                <input id="cnomcom" type="text" class="form-control" name="cnomcom"
                                       value="{{$comensal[0]->cNomCom}}" required autofocus>
                                <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                                    </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('capecom') ? ' has-error' : '' }}">
                         <span id="capecom">
                        <input id="capecom" type="text" class="form-control" name="capecom"
                               value="{{$comensal[0]->cApeCom}}" required>
                              <span class="textfieldRequiredMsg">Campo obligatorio.</span>
     </span>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="nombre" class="control-label">Documento</label>
                </div>
                <div class="col-md-6">
                    <label for="apellido" class="control-label">Telefono</label>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('cdnicom') ? ' has-error' : '' }}">

                    <span id="cdnicom">
                        <input id="cdnicom" type="text" class="form-control" name="cdnicom"
                               value="{{ $comensal[0]->cDniCom }}" required>
                     <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                     <span class="textfieldInvalidFormatMsg">Formato invalido.</span>
                    </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <span id="ctelcom">
                        <input id="ctelcom" type="text" class="form-control" name="ctelcom"
                               value="{{ $comensal[0]->cTelCom }}">
                            <span class="textfieldInvalidFormatMsg">Formato invalido.</span>
                        </span>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="nombre" class="control-label">Clave Unica</label>
                </div>
                <div class="col-md-3">
                    <label for="apellido" class="control-label">#Menus</label>
                </div>
                <div class="col-md-3">
                    <label for="apellido" class="control-label">Pago</label>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('cclavcom') ? ' has-error' : '' }}">
                        <span id="cclavcom">
                        <input id="cclavcom" type="text" class="form-control"
                               name="cclavcom" maxlength="5"
                               value="{{$comensal[0]->cClavCom}}" required>
                            <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('nnummenucom') ? ' has-error' : '' }}">
                         <span id="nnummenucom">
                        <input id="nnummenucom" type="text" class="form-control"
                               name="nnummenucom"
                               value="{{$comensal[0]->nNumMenuCom}}" required>
                             <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                             <span class="textfieldInvalidFormatMsg">Formato invalido.</span>
                         </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <span id="fpagocom">
                        <input id="fpagocom" type="text" class="form-control"
                               name="fpagocom"
                               value="{{ old('fpagocom') }}">
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
            <button class="btn btn-primary" type="submit" id="edit">
                Guardar <i class="fa fa-file-text"></i>
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

    var ecnomcomTxt = new Spry.Widget.ValidationTextField("cnomcom", 'none', {validateOn: ['change']});
    var ecapecomTxt = new Spry.Widget.ValidationTextField("capecom", 'none', {validateOn: ['change']});
    var ecdnicomTxt = new Spry.Widget.ValidationTextField("cdnicom", 'none', {validateOn: ['change']});
    var ecdnicomReal = new Spry.Widget.ValidationTextField("cdnicom", 'real', {validateOn: ['change']});
    var ectelcomReal = new Spry.Widget.ValidationTextField("ctelcom", 'real', {validateOn: ['change']});
    var ecclavcomText = new Spry.Widget.ValidationTextField("cclavcom", 'none', {validateOn: ['change']});
    var ennummenucomTxt = new Spry.Widget.ValidationTextField("nnummenucom", 'none', {validateOn: ['change']});
    var ennummenucomReal = new Spry.Widget.ValidationTextField("nnummenucom", 'real', {validateOn: ['change']});
    var efpagocomTxt = new Spry.Widget.ValidationTextField("fpagocom", 'none', {validateOn: ['change']});
    var efpagocomReal = new Spry.Widget.ValidationTextField("fpagocom", 'real', {validateOn: ['change']});
    //-->
</script>