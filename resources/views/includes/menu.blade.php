            <li><a href="{{ URL::asset('admin/empresas') }}">Empresas</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empresas<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ URL::asset('informes/ultdias/30') }}">Ultimos 30 Días</a></li>
                  <li><a href="{{ URL::asset('informes/ultdias/365') }}">Ultimos 365 Días</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="{{ URL::asset('informes/mesesEjercicio/'.date('Y')) }}">Meses por Años</a></li>
                </ul>            
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gráficas<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ URL::asset('graficas/meses/2000') }}">2000</a></li>
                  <li><a href="{{ URL::asset('graficas/meses/2001') }}">2001</a></li>
                </ul>
            </li>
            <li><a href="{{ URL::asset('admin/logout') }}">Salir</a></li>
