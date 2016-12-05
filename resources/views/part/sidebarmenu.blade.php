<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i>Principal</a>

            </li>
            <li><a><i class="fa fa-edit"></i> Mantenimientos <span
                            class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('/comensales') }}">Comensales</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i>Control<span
                            class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('/control') }}">Menu</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-table"></i> Pagos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('/pagos') }}">Actualizar Pago</a></li>

                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Reportes <span
                            class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="chartjs.html">Chart JS</a></li>
                    <li><a href="chartjs2.html">Chart JS2</a></li>
                    <li><a href="morisjs.html">Moris JS</a></li>
                    <li><a href="echarts.html">ECharts</a></li>
                    <li><a href="other_charts.html">Other Charts</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->