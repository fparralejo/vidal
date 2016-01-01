            <li><a href="{{ URL::asset('admin/empresas') }}">Empresas</a></li>
            <li><a href="{{ URL::asset('admin/usuarios') }}">Usuarios</a></li>
            <li><a href="{{ URL::asset('admin/perfiles') }}">Perfiles</a></li>
            <li><a href="{{ URL::asset('admin/asig_perfiles') }}">Asignación Perfiles</a></li>
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
            <li><a href="{{ URL::asset('admin/logout') }}">Salir</a></li>
