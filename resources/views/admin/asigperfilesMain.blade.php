@extends('admin.layout')


@section('principal')
<h4 class="page-header">Asignación de Perfiles</h4>

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
        @foreach ($listPerfiles as $perfil)
            { "sType": 'string' },
        @endforeach
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

        
//dd($datos);die;
?>

<form role="form" class="form-horizontal" id="usuarioForm" name="usuarioForm" action="{{ URL::asset('admin/asig_perfiles') }}" method="post">
     <!--CSRF Token--> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

<table id="ejemplo1" class="table table-striped table-bordered table-hover tablaResponsive" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 10%;">Id</th>
            <th style="width: 20%;">Opción</th>
            @foreach ($listPerfiles as $perfil)
                <th style="width: 15%;">{{ $perfil->perfil }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($datos as $opcion){
    $url="";
    //var_dump($opcion);die;
    ?>
        <tr>
            <td class="sgsiRow" onClick="{{ $url }}">{{ $opcion['id'] }}</td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $opcion['opcion'] }}
            </td>
            @foreach ($listPerfiles as $perfil)
            <td class="sgsiRow" onClick="{{ $url }}">
                <div align="center">
                <?php
                //busco si este perfil esta en esta opcion (en el array)
                $checked = "";
                if(in_array($perfil->idPerfil,$opcion['perfiles'])){
                    $checked = "checked";
                }
                ?>
                <input type="checkbox" name="op_{{ $opcion['id'] }}_{{ $perfil->idPerfil }}" <?php echo $checked; ?>>
                </div>
            </td>
            @endforeach
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

       

    <input type="submit" id="submitir" class="btn btn-primary" value="Actualizar"/>
</form>

<!--BORRAR-->

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



