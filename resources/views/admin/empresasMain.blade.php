@extends('admin.layout')


@section('principal')
<h4 class="page-header">Empresas</h4>

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
        { "sType": 'string' }
    ],                    
    "bJQueryUI":true,
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
});
} );


function leerEmpresa(Id){
    $.ajax({
        data:{"Id":Id},  
        url: '{{ URL::asset("admin/empresa/show") }}',
        type:"get",
        success: function(data) {
            var empresa = JSON.parse(data);
            //var asiento = data;
            $('#Id').val(empresa.Id);
            $('#empresa').val(empresa.empresa);
            $('#pass').val(empresa.pass);
            $('#nombre').val(empresa.nombre);
            $('#direccion').val(empresa.direccion);
            $('#localidad').val(empresa.localidad);
            $('#provincia').val(empresa.provincia);
            $('#CP').val(empresa.CP);
            $('#pais').val(empresa.pais);
            $('#CIFNIF').val(empresa.CIFNIF);

            //cambiar nombre del titulo del formulario
            $("#tituloForm").html('Editar Empresa');
            $("#submitir").val('OK');
            //desactivo el campo de empresa (no se puede cambiar)
            $("#empresa").prop('disabled', true);
        }
    });
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

//dd($arResult);die;
?>

<table id="ejemplo1" class="table table-striped table-bordered table-hover tablaResponsive" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 10%;">Id</th>
            <th style="width: 45%;">Nombre</th>
            <th style="width: 15%;">Localidad</th>
            <th style="width: 15%;">Provincia</th>
            <th style="width: 15%;">Pais</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($arResult as $empresa)
    <?php
    $url="javascript:leerEmpresa('".$empresa->idEmpresa."');";
    
    ?>
        <tr>
            <td class="sgsiRow" onClick="{{ $url }}">{{ $empresa->idEmpresa }}</td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $empresa->nombre }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $empresa->localidad }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $empresa->provincia }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $empresa->pais }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<hr/>
<h4><span id="tituloForm">Nueva Empresa</span></h4>
<br/>

<style type="text/css">
#productForm .inputGroupContainer .form-control-feedback,
#productForm .selectContainer .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>

<form role="form" class="form-horizontal" id="empresaForm" name="empresaForm" action="{{ URL::asset('admin/empresas') }}" method="post">
     <!--CSRF Token--> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="empresa">Nick Empresa</label>
                <input type="text" class="form-control" id="empresa" name="empresa" maxlength="15" 
                       value="{{ Input::old('empresa') }}">
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
        <div class="col-md-11">
            <div class="form-group">
                <label for="nombre">Nombre Empresa</label>
                <input type="text" class="form-control" id="nombre" name="nombre" maxlength="100"
                       value="{{ Input::old('nombre') }}">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-11">
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" maxlength="150">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="localidad">Localidad</label>
                <input type="text" class="form-control" id="localidad" name="localidad" maxlength="50">
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="provincia">Provincia</label>
                <input type="text" class="form-control" id="provincia" name="provincia" maxlength="50">
            </div>
        </div>
    </div>    
    
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="CP">C.P.</label>
                <input type="text" class="form-control" id="CP" name="CP" maxlength="10">
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="pais">Pais</label>
                <input type="text" class="form-control" id="pais" name="pais" maxlength="50">
            </div>
        </div>
    </div>    
    
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="CIFNIF">CIF/NIF</label>
                <input type="text" class="form-control" id="CIFNIF" name="CIFNIF" maxlength="20">
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
    $('#empresaForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            empresa: {
                validators: {
                    notEmpty: {
                        message: 'El nick de la empresa es requerido'
                    }
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'La clave de la empresa es requerida'
                    }
                }
            },
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de la empresa es requerido'
                    }
                }
            }
        }
    });
    
    
});
</script>
    
@stop



