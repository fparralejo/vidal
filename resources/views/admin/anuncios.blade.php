@extends('admin.layout')


@section('principal')
<h4 class="page-header">Anuncio</h4>

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
        { "sType": 'string' },
        { "sType": 'string' },
        { "sType": 'string' }
    ],                    
    "bJQueryUI":true,
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
});
} );


function leerModelo(Id){
    $.ajax({
        data:{"Id":Id},  
        url: '{{ URL::asset("admin/modelo/show") }}',
        type:"get",
        success: function(data) {
            var modelo = JSON.parse(data);
            $('#Id').val(modelo.Id);
            $('#marca').val(modelo.marca);
            $('#year').val(modelo.year);
            $('#combustible').val(modelo.combustible);
            $('#modelo').val(modelo.modelo);
            $('#carroceria').val(modelo.carroceria);
            $('#version').val(modelo.version);

            //cambiar nombre del titulo del formulario
            $("#tituloForm").html('Editar Modelo');
            $("#submitir").val('OK');
        }
    });
}

function borrarModelo(Id){
    if (confirm("¿Desea borrar este modelo?"))
    {
        $.ajax({
          data:{"Id":Id},
          url: '{{ URL::asset("admin/modelo/delete") }}',
          type:"get",
          success: function(data) {
                $('#accionTabla').html(data);
                $('#accionTabla').show();
          }
        });
        setTimeout(function ()
        {
            document.location.href="{{URL::to('admin/modelos')}}";
        }, 1000);
    }
}

function copiarModelo(Id){
    if (confirm("¿Desea copiar este modelo?"))
    {
        $.ajax({
          data:{"Id":Id},
          url: '{{ URL::asset("admin/modelo/copy") }}',
          type:"get",
          success: function(data) {
                $('#accionTabla').html(data);
                $('#accionTabla').show();
          }
        });
        setTimeout(function ()
        {
            document.location.href="{{URL::to('admin/modelos')}}";
        }, 2000);
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

        
dd($arResult);die;
?>

<table id="ejemplo1" class="table table-striped table-bordered table-hover tablaResponsive" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 5%;">Id</th>
            <th style="width: 10%;">Marca</th>
            <th style="width: 5%;">Año</th>
            <th style="width: 10%;">Combustible</th>
            <th style="width: 15%;">Modelo</th>
            <th style="width: 20%;">Carroceria</th>
            <th style="width: 25%;">Versión</th>
            <th style="width: 5%;"></th>
            <th style="width: 5%;"></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($arResult as $modelo)
    <?php
    $url="javascript:leerModelo('".$modelo->idModelo."');";
    ?>
        <tr>
            <td class="sgsiRow" onClick="{{ $url }}">{{ $modelo->idModelo }}</td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $modelo->marca }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $modelo->year }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $modelo->combustible }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $modelo->modelo }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $modelo->carroceria }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $modelo->version }}
            </td>
            <td>
                <button type="button" onclick="copiarModelo({{ $modelo->idModelo }})" class="btn btn-xs btn-info">Copiar</button>
            </td>
            <td>
                <button type="button" onclick="borrarModelo({{ $modelo->idModelo }})" class="btn btn-xs btn-danger">Borrar</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<hr/>
<h4><span id="tituloForm">Nuevo Modelo</span></h4>
<br/>

<style type="text/css">
#productForm .inputGroupContainer .form-control-feedback,
#productForm .selectContainer .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>

<form role="form" class="form-horizontal" id="modeloForm" name="modeloForm" action="{{ URL::asset('admin/modelos') }}" method="post">
     <!--CSRF Token--> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
        <div class="col-md-5">
            <label for="marca">Marca</label>
            <div class="form-group">
                <input type="text" class="form-control" id="marca" name="marca" maxlength="50" 
                       value="{{ Input::old('marca') }}">
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="year">Año</label>
                <input type="text" class="form-control" id="year" name="year" maxlength="6"
                       value="{{ Input::old('year') }}">
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>    
    
    <div class="row">
        <div class="col-md-5">
            <label for="combustible">Combustible</label>
            <?php
            $gasolina = "";
            $diesel = "";
            $elec = "";
            $otros = "";
            if('Gasolina' === Input::old('combustible')){
                $gasolina = "selected";
            }else
            if('Diesel' === Input::old('combustible')){
                $diesel = "selected";
            }else
            if('Electrico/Hibrido' === Input::old('combustible')){
                $elec = "selected";
            }else
            if('Otros' === Input::old('combustible')){
                $otros = "selected";
            }
            ?>
            <select class="form-control" id="combustible" name="combustible">
                <option value="Gasolina" <?php echo $gasolina; ?>>Gasolina</option>
                <option value="Diesel" <?php echo $diesel; ?>>Diesel</option>
                <option value="Electrico/Hibrido" <?php echo $elec; ?>>Electrico/Hibrido</option>
                <option value="Otros" <?php echo $otros; ?>>Otros</option>
            </select>
        </div>
        <div class="col-md-1">
            <br/>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" maxlength="50"
                       value="{{ Input::old('modelo') }}">
            </div>
        </div>
    </div>    

    <div class="row">
        <div class="col-md-5">
            <label for="carroceria">Carroceria</label>
            <div class="form-group">
                <input type="text" class="form-control" id="carroceria" name="carroceria" maxlength="50" 
                       value="{{ Input::old('carroceria') }}">
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-6">
            <label for="version">Versión</label>
            <div class="form-group">
                <input type="text" class="form-control" id="version" name="version" maxlength="50" 
                       value="{{ Input::old('version') }}">
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
    $('#modeloForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            marca: {
                validators: {
                    notEmpty: {
                        message: 'La marca del coche es requerido'
                    }
                }
            },
            year: {
                validators: {
                    notEmpty: {
                        message: 'El año del coche es requerido'
                    },
                    numeric: {
                        message: 'El año del coche es numérico'
                    }
                }
            },
            modelo: {
                validators: {
                    notEmpty: {
                        message: 'El modelo del coche es requerido'
                    }
                }
            },
            carroceria: {
                validators: {
                    notEmpty: {
                        message: 'La carroceria del coche es requerida'
                    }
                }
            },
            version: {
                validators: {
                    notEmpty: {
                        message: 'La versión del coche es requerida'
                    }
                }
            }
        }
    });
    
    
});
</script>
    
@stop



