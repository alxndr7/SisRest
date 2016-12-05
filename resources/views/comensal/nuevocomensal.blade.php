<script>
    // add function
    $("#add").click(function () {
        if (cnomcomTxt.validate() && capecomTxt.validate() && cdnicomTxt.validate() && cdnicomReal.validate() && ctelcomReal.validate() &&
                cclavcomText.validate() && nnummenucomTxt.validate() && nnummenucomReal.validate() && fpagocomTxt.validate() && fpagocomReal.validate()) {
            $.ajax({
                type: 'post',
                url: '/comensalesadd',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'cnomcom': $('input[name=cnomcom]').val(),
                    'capecom': $('input[name=capecom]').val(),
                    'cdnicom': $('input[name=cdnicom]').val(),
                    'ctelcom': $('input[name=ctelcom]').val(),
                    'cclavcom': $('input[name=cclavcom]').val(),
                    'nnummenucom': $('input[name=nnummenucom]').val(),
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
            <h4 class="modal-title" id="myModalLabel2">Nuevo Comensal</h4>
        </div>
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
                                       value="{{ old('cnomcom') }}" required autofocus>
                                <span class="textfieldRequiredMsg">Campo obligatorio.</span>
     </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('capecom') ? ' has-error' : '' }}">
                                 <span id="capecom">
                                <input id="capecom" type="text" class="form-control" name="capecom"
                                       value="{{ old('capecom') }}" required>
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
                                       value="{{ old('cdnicom') }}" required>
                                 <span class="textfieldRequiredMsg">Campo obligatorio.</span>
        <span class="textfieldInvalidFormatMsg">Formato invalido.</span>
     </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
<span id="ctelcom">
                                <input id="ctelcom" type="text" class="form-control" name="ctelcom"
                                       value="{{ old('ctelcom') }}">
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
                                       value="{{ old('cclavcom') }}" required>
                                   <span class="textfieldRequiredMsg">Campo obligatorio.</span>
     </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('nnummenucom') ? ' has-error' : '' }}">
                                  <span id="nnummenucom">
                                <input id="nnummenucom" type="text" class="form-control" name="nnummenucom"
                                       value="{{ old('nnummenucom') }}" required>
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
            <button class="btn btn-primary" type="submit" id="add">
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

    var cnomcomTxt = new Spry.Widget.ValidationTextField("cnomcom", 'none', {validateOn: ['change']});
    var capecomTxt = new Spry.Widget.ValidationTextField("capecom", 'none', {validateOn: ['change']});
    var cdnicomTxt = new Spry.Widget.ValidationTextField("cdnicom", 'none', {validateOn: ['change']});
    var cdnicomReal = new Spry.Widget.ValidationTextField("cdnicom", 'real', {validateOn: ['change']});
    var ctelcomReal = new Spry.Widget.ValidationTextField("ctelcom", 'real', {validateOn: ['change']});
    var cclavcomText = new Spry.Widget.ValidationTextField("cclavcom", 'none', {validateOn: ['change']});
    var nnummenucomTxt = new Spry.Widget.ValidationTextField("nnummenucom", 'none', {validateOn: ['change']});
    var nnummenucomReal = new Spry.Widget.ValidationTextField("nnummenucom", 'real', {validateOn: ['change']});
    var fpagocomTxt = new Spry.Widget.ValidationTextField("fpagocom", 'none', {validateOn: ['change']});
    var fpagocomReal = new Spry.Widget.ValidationTextField("fpagocom", 'real', {validateOn: ['change']});
    //-->
</script>