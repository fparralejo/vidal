@extends('parte.layout')


@section('principal')
<h4 class="page-header">Parte Proyecto Web Coches Vidal</h4>

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
        { "sType": 'string' },
        { "sType": 'string' },
        { "sType": 'string' },
        { "sType": 'string' }
    ],                    
    "bJQueryUI":true,
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
});
} );


//function leerUsuario(Id){
//    $.ajax({
//        data:{"Id":Id},  
//        url: '{{ URL::asset("admin/usuario/show") }}',
//        type:"get",
//        success: function(data) {
//            var usuario = JSON.parse(data);
//            $('#Id').val(usuario.Id);
//            $('#idEmpresa').val(usuario.idEmpresa);
//            $('#usuario').val(usuario.usuario);//
//            $('#pass').val(usuario.pass);
//            $('#nombre').val(usuario.nombre);
//            $('#apellidos').val(usuario.apellidos);
//            $('#NIF').val(usuario.NIF);
//            $('#idPerfil').val(usuario.idPerfil);
//            $('#email').val(usuario.email);
//            $('#telefono').val(usuario.telefono);
//
//            //cambiar nombre del titulo del formulario
//            $("#tituloForm").html('Editar Usuario');
//            $("#submitir").val('OK');
//            //desactivo el campo de usuario (no se puede cambiar)
//            $("#usuario").prop('usuario', true);
//        }
//    });
//}

//function borrarUsuario(Id){
//    if (confirm("¿Desea borrar este usuario?"))
//    {
//        $.ajax({
//          data:{"Id":Id},
//          url: '{{ URL::asset("admin/usuario/delete") }}',
//          type:"get",
//          success: function(data) {
//                $('#accionTabla').html(data);
//                $('#accionTabla').show();
//          }
//        });
//        setTimeout(function ()
//        {
//            document.location.href="{{URL::to('admin/usuarios')}}";
//        }, 1000);
//    }
//}


////hacer desaparecer en cartel
//$(document).ready(function() {
//    setTimeout(function() {
//        $("#accionTabla2").fadeOut(1500);
//    },3000);
//});

        
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
            <th style="width: 10%;">Fecha</th>
            <th style="width: 15%;">Tipo</th>
            <th style="width: 10%;">Horas</th>
            <th style="width: 65%;">Descripción</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $totalHoras = 0;
    ?>
    @foreach ($arResult as $parte)
    <?php
    $url="";
    $fecha = \Carbon\Carbon::createFromFormat('Y-m-d',$parte->fecha)->format('d/m/Y');

    $totalHoras = $totalHoras + (int)$parte->horas;
    
    ?>
        <tr>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $fecha }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $parte->tipo }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $parte->horas }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $parte->descripcion }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<hr/>
<h4><span id="tituloForm">Total Horas {{ $totalHoras }}</span></h4>
<br/>

<style type="text/css">
#productForm .inputGroupContainer .form-control-feedback,
#productForm .selectContainer .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>

    
@stop



