<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentellela Alela! | </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="css/nprogress/nprogress.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="css/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Validaciones -->
    <link href="css/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/home" class="site_title"><i class="fa fa-cutlery"></i> <span>Restaurantes0.1</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
               @include('part.menuprofile')
                <!-- /menu profile quick info -->
                <br/>

                <!-- sidebar menu -->
               @include('part.sidebarmenu')
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
               @include('part.menufooter')
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->



            @include('part.topnavigation')

        <!-- /top navigation -->

        <!-- content -->
        @yield('content')
        <!-- /content -->

        <!-- footer content -->
        @include('part.footer')
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- NProgress -->
<script src="js/nprogress.js"></script>
<!-- Datatables -->
<script src="datatables.net/js/jquery.dataTables.min.js"></script>
<script src="datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="jszip/dist/jszip.min.js"></script>
<script src="pdfmake/build/pdfmake.min.js"></script>
<script src="pdfmake/build/vfs_fonts.js"></script>
<!-- Custom Theme Scripts -->
<script src="js/custom.min.js"></script>
<!-- loader blockui -->
<script src="js/blockUI.js"></script>
<!-- Validaciones -->
<script src="js/SpryValidationTextField.js" type="text/javascript"></script>

<!-- Datatables -->
<script>
    var cantMenusTxt = new Spry.Widget.ValidationTextField("cantMenus", 'none', {validateOn:['change']});
    var cantMenusReal = new Spry.Widget.ValidationTextField("cantMenus", 'real', {validateOn:['change'],minValue:1});
    var dniComensalTxt = new Spry.Widget.ValidationTextField("dniComensal", 'none', {validateOn:['change']});
    var dniComensalFor = new Spry.Widget.ValidationTextField("dniComensal", "social_security_number", {format:"custom", pattern:"00000000"});

    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);

    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {
                init: function () {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[1, 'asc']],
            'columnDefs': [
                {orderable: false, targets: [0]}
            ]
        });
        $datatable.on('draw.dt', function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();
    });

    $('a.recargar_nuevo').click(function (event) {
        //alert('hola1');
        event.preventDefault(); //cancela el comportamiento por defecto
        $('#myModal').load($(this).attr('href'));
        $('#myModal').modal('show');
    });

function openModal(url,cod){
    //alert(url + ' / ' + cod);
    $.ajax({
        type: 'get',
        url: url,
        data: {
            'ncodcom': cod
        },
        success: function(data) {
            //alert(data);
            event.preventDefault();
            $('#myModal').modal('show');
            $('#myModal').show().html(data);
        },

    });

}
/*
    $('a.recargar_link').click(function (event) {
        //alert($(this).attr('href'));
        event.preventDefault(); //cancela el comportamiento por defecto
        $.ajax({
            type: 'get',
            url: $(this).attr('href'),
            data: {
                'ncodcom': $('input[name=ncodcom]').val()
            },
            success: function(data) {
                //alert(data);
                $('#myModal').modal('show');
                $('#myModal').show().html(data);
            },

        });

    });
*/


</script>
<!-- /Datatables -->

</body>
</html>
