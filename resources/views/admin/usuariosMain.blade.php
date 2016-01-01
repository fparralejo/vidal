@extends('admin.layout')


@section('principal')
<h4 class="page-header">Usuarios</h4>

<style>
    .sgsiRow:hover{
        cursor: pointer;
    }

    @media screen and (max-width: 640px) {    
        .tablaResponsive{
            overflow-x: auto;
            display: inline-block;
        }
    }
</style>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
$('#ejemplo1').dataTable({
    "responsive": true,
    "bProcessing": true,
    "sPaginationType":"full_numbers",
    "oLanguage": {
        "sLengthMenu": "Ver _MENU_ registros por pagina",
        "sZeroRecords": "No se han encontrado registros",
        "sInfo": "Ver _START_ al _END_ de _TOTAL_ Registros",
        "sInfoEmpty": "Ver 0 al 0 de 0 registros",
        "sInfoFiltered": "(filtrados _MAX_ total registros)",
        "sSearch": "Busqueda:",
        "oPaginate": { 
            "sLast": ">>", 
            "sFirst": "<<", 
            "sNext": "<", 
            "sPrevious": ">" 
        }
    },
    "bSort":true,
    //"aaSorting": [[ 0, "asc" ]],
    "aoColumns": [
        { "sType": 'numeric' },
        { "sType": 'string' },
        { "sType": 'string' },
        { "sType": 'string' },
        { "sType": 'string' },
        { "sType": 'string' },
        { "sType": 'string' }
    ],                    
    "bJQueryUI":true,
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
});
} );


function leerUsuario(Id){
    $.ajax({
        data:{"Id":Id},  
        url: '{{ URL::asset("admin/usuario/show") }}',
        type:"get",
        success: function(data) {
            var usuario = JSON.parse(data);
            $('#Id').val(usuario.Id);
            $('#idEmpresa').val(usuario.idEmpresa);
            $('#usuario').val(usuario.usuario);//
            $('#pass').val(usuario.pass);
            $('#nombre').val(usuario.nombre);
            $('#apellidos').val(usuario.apellidos);
            $('#NIF').val(usuario.NIF);
            $('#idPerfil').val(usuario.idPerfil);
            $('#email').val(usuario.email);
            $('#telefono').val(usuario.telefono);

            //cambiar nombre del titulo del formulario
            $("#tituloForm").html('Editar Usuario');
            $("#submitir").val('OK');
            //desactivo el campo de usuario (no se puede cambiar)
            $("#usuario").prop('usuario', true);
        }
    });
}

function borrarUsuario(Id){
    if (confirm("¿Desea borrar este usuario?"))
    {
        $.ajax({
          data:{"Id":Id},
          url: '{{ URL::asset("admin/usuario/delete") }}',
          type:"get",
          success: function(data) {
                $('#accionTabla').html(data);
                $('#accionTabla').show();
          }
        });
        setTimeout(function ()
        {
            document.location.href="{{URL::to('admin/usuarios')}}";
        }, 1000);
    }
}


//hacer desaparecer en cartel
$(document).ready(function() {
    setTimeout(function() {
        $("#accionTabla2").fadeOut(1500);
    },3000);
});

        
</script>


 <!--aviso de alguna accion--> 
<div class="alert alert-success" role="alert" id="accionTabla" style="display: none; ">
</div>

@if (Session::has('errors'))
<div class="alert alert-success" id="accionTabla2" role="alert" style="display: block; ">
{{ $errors }}
</div>
@endif


<?php
//busco el nombre de la empresa

        
//dd($arResult);die;
?>

<table id="ejemplo1" class="table table-striped table-bordered table-hover tablaResponsive" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 10%;">Id</th>
            <th style="width: 15%;">Nombre</th>
            <th style="width: 20%;">Apellidos</th>
            <th style="width: 20%;">Empresa</th>
            <th style="width: 15%;">E-mail</th>
            <th style="width: 10%;">Teléfono</th>
            <th style="width: 10%;"></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($arResult as $usuario)
    <?php
    $url="javascript:leerUsuario('".$usuario->idUsuario."');";
    
    foreach ($listEmpresas as $empresa){
        if($empresa->idEmpresa === $usuario->idEmpresa){
           $nombreEmpresa = $empresa->nombre;
           break;
        }
    }
    ?>
        <tr>
            <td class="sgsiRow" onClick="{{ $url }}">{{ $usuario->idUsuario }}</td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $usuario->nombre }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $usuario->apellidos }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $nombreEmpresa }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $usuario->email }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $usuario->telefono }}
            </td>
            <td>
                <button type="button" onclick="borrarUsuario({{ $usuario->idUsuario }})" class="btn btn-xs btn-danger">Borrar</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<hr/>
<h4><span id="tituloForm">Nuevo Usuario</span></h4>
<br/>

<style type="text/css">
#productForm .inputGroupContainer .form-control-feedback,
#productForm .selectContainer .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>

<form role="form" class="form-horizontal" id="usuarioForm" name="usuarioForm" action="{{ URL::asset('admin/usuarios') }}" method="post">
     <!--CSRF Token--> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
        <div class="col-md-9">
            <label for="idEmpresa">Empresa</label>
            <select class="form-control" id="idEmpresa" name="idEmpresa">
                @foreach ($listEmpresas as $empresa)
                    @if($empresa->idEmpresa === Input::old('idEmpresa'))
                    <option value="{{ $empresa->idEmpresa }}" selected>{{ $empresa->nombre }}</option>
                    @else
                    <option value="{{ $empresa->idEmpresa }}">{{ $empresa->nombre }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>    
    <br/>
    
    <div class="row">
        <div class="col-md-5">
            <label for="usuario">Nick de Usuario</label>
            <div class="form-group">
                <input type="text" class="form-control" id="usuario" name="usuario" maxlength="15" 
                       value="{{ Input::old('usuario') }}">
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="pass">Clave</label>
                <input type="text" class="form-control" id="pass" name="pass" maxlength="15"
                       value="{{ Input::old('pass') }}">
            </div>
        </div>
    </div>    
    
    <div class="row">
        <div class="col-md-5">
            <label for="nombre">Nombre</label>
            <div class="form-group">
                <input type="text" class="form-control" id="nombre" name="nombre" maxlength="30" 
                       value="{{ Input::old('nombre') }}">
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" maxlength="100"
                       value="{{ Input::old('apellidos') }}">
            </div>
        </div>
    </div>    

    <div class="row">
        <div class="col-md-5">
            <label for="NIF">NIF</label>
            <div class="form-group">
                <input type="text" class="form-control" id="NIF" name="NIF" maxlength="15" 
                       value="{{ Input::old('NIF') }}">
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-6">
            <label for="idPerfil">Perfil Usuario</label>
            <select class="form-control" id="idPerfil" name="idPerfil">
                @foreach ($listPerfiles as $perfil)
                    @if($perfil->idPerfil === Input::old('idPerfil'))
                    <option value="{{ $perfil->idPerfil }}" selected>{{ $perfil->perfil }}</option>
                    @else
                    <option value="{{ $perfil->idPerfil }}">{{ $perfil->perfil }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>    

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" maxlength="100">
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" maxlength="20">
            </div>
        </div>
    </div>    
    
    <br/>

    <input type="hidden" id="Id" name="Id" value="" />
    <input type="submit" id="submitir" class="btn btn-primary" value="Nuevo"/>
</form>


<!--validaciones-->
<script>
$(document).ready(function() {
    $('#usuarioForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            usuario: {
                validators: {
                    notEmpty: {
                        message: 'El nick del usuario es requerido'
                    }
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'La clave del usuario es requerida'
                    }
                }
            },
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del usuario es requerido'
                    }
                }
            },
            apellidos: {
                validators: {
                    notEmpty: {
                        message: 'Los apellidos del usuario son requeridos'
                    }
                }
            }
        }
    });
    
    
});
</script>
    
@stop



