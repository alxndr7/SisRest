
@if($comensal)
<br/>
    <input type="hidden" name="ncodcom" id="ncodcom" value="{{ $comensal[0]->nCodCom }}">

    <div class="row">
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Nombre: </label>

        <div class="col-md-4 col-sm-9 col-xs-12">
            <input type="text" class="form-control" id="cnomcom" disabled="disabled" placeholder="Nombre"
                   value="{{ $comensal[0]->cNomCom }} {{ $comensal[0]->cApeCom }}">
        </div>
        <label class="control-label col-md-1 col-sm-3 col-xs-12">DNI: </label>

        <div class="col-md-2 col-sm-9 col-xs-12">
            <input type="text" class="form-control" id="cdnicom" disabled="disabled" placeholder="DNI"
                   value="{{ $comensal[0]->cDniCom }}">
        </div>
        <label class="control-label col-md-1 col-sm-3 col-xs-12">#Menus:</label>

        <div class="col-md-2 col-sm-9 col-xs-12" style="text-align: right">
            <input type="text" class="form-control" id="nnummenucom" disabled="disabled" placeholder="00"
                   value="{{ $comensal[0]->nNumMenuCom }}">
        </div>
    </div>


    <div class="row">
        <div class="col-md-5 col-sm-9 col-xs-12">
        </div>
        <label class="control-label col-md-1 col-sm-3 col-xs-12">Pago: </label>

        <div class="col-md-2 col-sm-9 col-xs-12">
            <span id="fpagocom">
            <input type="text" name="fpagocom" id="fpagocom" class="form-control" placeholder="0.00" required>
                <span class="textfieldRequiredMsg">Campo obligatorio.</span>
                <span class="textfieldInvalidFormatMsg">Formato invalido.</span>

            </span>
        </div>
        <label class="control-label col-md-1 col-sm-3 col-xs-12">#Menus: </label>

        <div class="col-md-2 col-sm-9 col-xs-12">
              <span id="ncantmenu">
            <input type="text" name="ncantmenu" id="ncantmenu" class="form-control" placeholder="00" required>
            <span class="textfieldRequiredMsg">Campo obligatorio.</span>
            <span class="textfieldInvalidFormatMsg">Formato invalido.</span>

            </span>
        </div>


    </div>

    <div class="ln_solid"></div>
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12">
        </div>
        <div class="col-md-2 col-sm-9 col-xs-12" style="text-align: center">
            <button type="submit" class="btn btn-success" onclick="generarPago();"><i class="fa fa-credit-card-alt"></i>
                Agregar Pago
            </button>
        </div>
    </div>
@else

    <div class="alert alert-danger alert-dismissible fade in" role="alert" style="text-align: center" id="respuesta">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>{{$respuesta}}</strong>
    </div>

@endif

<script type="text/javascript">
    <!--
    var fpagocomTxt = new Spry.Widget.ValidationTextField("fpagocom", 'none', {validateOn:['change']});
    var fpagocomReal = new Spry.Widget.ValidationTextField("fpagocom", 'real', {validateOn:['change']});
    var ncantmenuText = new Spry.Widget.ValidationTextField("ncantmenu", 'none', {validateOn:['change']});
    var ncantmenuReal = new Spry.Widget.ValidationTextField("ncantmenu", 'real', {validateOn:['change']});
    //-->
    setTimeout(function() {
        $("#respuesta").fadeOut(1500);
    },1500);
</script>