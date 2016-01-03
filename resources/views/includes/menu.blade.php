            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empresas y Usuarios<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ URL::asset('admin/empresas') }}">Empresas</a></li>
                  <li><a href="{{ URL::asset('admin/usuarios') }}">Usuarios</a></li>
                  <li><a href="{{ URL::asset('admin/perfiles') }}">Perfiles</a></li>
                  <li><a href="{{ URL::asset('admin/asig_perfiles') }}">Asignación Perfiles</a></li>
                </ul>            
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Datos Coches<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ URL::asset('admin/modelos') }}">Modelos</a></li>
                  <li><a href="{{ URL::asset('admin/perfiles') }}">Perfiles</a></li>
                  <li><a href="{{ URL::asset('admin/asig_perfiles') }}">Asignación Perfiles</a></li>
                </ul>            
            </li>
            <li><a href="{{ URL::asset('admin/empresas') }}">Empresas</a></li>
            <li><a href="{{ URL::asset('admin/usuarios') }}">Usuarios</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ URL::asset('admin/logout') }}">Salir</a></li>
