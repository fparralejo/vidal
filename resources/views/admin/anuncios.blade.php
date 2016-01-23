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
        { "sType": 'string' },
        { "sType": 'string' },
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


function leerAnuncio(idAnuncio,idModelo){
    $.ajax({
        data:{"idAnuncio":idAnuncio,"idModelo":idModelo},  
        url: '{{ URL::asset("admin/anuncio/show") }}',
        type:"get",
        success: function(data) {
            var modelo = JSON.parse(data);
            $('#Id').val(modelo.Id);
            $('#marca').val(modelo.marca);
            $('#year').val(modelo.year);
            $('#combustible').val(modelo.combustible);
            
            listarModelosMarcaInicial(modelo.marca,modelo.year,modelo.combustible,modelo.modelo);
            listarCarroceriaInicial(modelo.marca,modelo.year,modelo.combustible,modelo.modelo,modelo.carroceria);
            listarVersionInicial(modelo.marca,modelo.year,modelo.combustible,modelo.modelo,modelo.carroceria,modelo.version);
            
            $('#kilometros').val(modelo.kilometros);
            $('#observaciones').val(modelo.observaciones);
            $('#color').val(modelo.color);
            $('#precio').val(modelo.precio);
            $('#tipo_cambio').val(modelo.tipo_cambio);
            $('#youtube_url').val(modelo.youtube_url);

            if(modelo.tipo === 'usuario'){
                $('#txtP1').html('Nombre');
                $('#P1').val(modelo.usuario);
                $('#txtP2').html('NIF');
                $('#P2').val(modelo.NIF);
                $('#txtP3').html('Empresa');
                $('#P3').val(modelo.empresa);
                $('#txtP4').html('Teléfono');
                $('#P4').val(modelo.telefono);
                $('#txtP5').html('E-mail');
                $('#P5').val(modelo.email);
                $("#tituloForm").html('Datos Usuario');
            }else
            if(modelo.tipo === 'contacto'){
                $('#txtP1').html('Nombre');
                $('#P1').val(modelo.contacto);
                $('#txtP2').html('Población');
                $('#P2').val(modelo.poblacion);
                $('#txtP3').html('Provincia');
                $('#P3').val(modelo.provincia);
                $('#txtP4').html('Teléfono');
                $('#P4').val(modelo.telefono);
                $('#txtP5').html('E-mail');
                $('#P5').val(modelo.email);
                $("#tituloForm").html('Datos Contacto');
            }

            //cambiar nombre del titulo del formulario
            document.getElementById("btnOK").style.display = "block";
            //$("#submitir").val('OK');
        }
    });
}

//function borrarModelo(Id){
//    if (confirm("¿Desea borrar este modelo?"))
//    {
//        $.ajax({
//          data:{"Id":Id},
//          url: '{{ URL::asset("admin/modelo/delete") }}',
//          type:"get",
//          success: function(data) {
//                $('#accionTabla').html(data);
//                $('#accionTabla').show();
//          }
//        });
//        setTimeout(function ()
//        {
//            document.location.href="{{URL::to('admin/modelos')}}";
//        }, 1000);
//    }
//}

function pasarConfirmado(Id){
    if (confirm("¿Desea confirmar este anuncio?"))
    {
        $.ajax({
          data:{"Id":Id},
          url: '{{ URL::asset("admin/anuncio/confirm") }}',
          type:"get",
          success: function(data) {
                $('#accionTabla').html(data);
                $('#accionTabla').show();
          }
        });
        setTimeout(function ()
        {
            document.location.href="{{URL::to('admin/anuncios')}}";
        }, 2000);
    }
}

function listarModelosMarcaInicial(marca,year,combustible,modelo){
    //compruebo que los tres campos tengan datos, sino no hacemos nada
    if (marca !== '' && year !== '' && combustible !== '') {
        $.ajax({
            data: {"marca": marca, "year": year, "combustible": combustible},
            url: '{{ URL::asset("publicar/listarModelos") }}',
            type: "get",
            success: function (data) {
                $('#modelo')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">-- Elige Modelo --</option>')
                    .val('');
                
                var modelos = JSON.parse(data);
                for (i = 0; i < modelos.length; i++) {
                    //$(new Option(modelos[i].modelo, modelos[i].modelo)).appendTo('#modelo');
                    if(modelos[i].modelo === modelo){
                        $('#modelo').append('<option value="'+modelos[i].modelo+'" selected>'+modelos[i].modelo+'</option>');
                    }else{
                        $('#modelo').append('<option value="'+modelos[i].modelo+'">'+modelos[i].modelo+'</option>');
                    }
                }
            }
        });
    }
}


function listarModelosMarca(marca,year,combustible){
    //compruebo que los tres campos tengan datos, sino no hacemos nada
    if (marca !== '' && year !== '' && combustible !== '') {
        $.ajax({
            data: {"marca": marca, "year": year, "combustible": combustible},
            url: '{{ URL::asset("publicar/listarModelos") }}',
            type: "get",
            success: function (data) {
                $('#modelo')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">-- Elige Modelo --</option>')
                    .val('');
                
                var modelos = JSON.parse(data);
                for (i = 0; i < modelos.length; i++) {
                    $(new Option(modelos[i].modelo, modelos[i].modelo)).appendTo('#modelo');
                }
            }
        });
    }
}

function listarCarroceriaInicial(marca,year,combustible,modelo,carroceria){
    //compruebo que los 4 campos tengan datos, sino no hacemos nada
    if (marca !== '' && year !== '' && combustible !== '' && modelo !== '') {
        $.ajax({
            data: {"marca": marca, "year": year, "combustible": combustible, "modelo": modelo},
            url: '{{ URL::asset("publicar/listarCarrocerias") }}',
            type: "get",
            success: function (data) {
                $('#carroceria')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">-- Elige Carroceria --</option>')
                    .val('');
                
                var carrocerias = JSON.parse(data);
                for (i = 0; i < carrocerias.length; i++) {
                    //$(new Option(carrocerias[i].carroceria, carrocerias[i].carroceria)).appendTo('#carroceria');
                    if(carrocerias[i].carroceria === carroceria){
                        $('#carroceria').append('<option value="'+carrocerias[i].carroceria+'" selected>'+carrocerias[i].carroceria+'</option>');
                    }else{
                        $('#carroceria').append('<option value="'+carrocerias[i].carroceria+'">'+carrocerias[i].carroceria+'</option>');
                    }
                }
            }
        });
    }
}

function listarCarroceria(marca,year,combustible,modelo){
    //compruebo que los 4 campos tengan datos, sino no hacemos nada
    if (marca !== '' && year !== '' && combustible !== '' && modelo !== '') {
        $.ajax({
            data: {"marca": marca, "year": year, "combustible": combustible, "modelo": modelo},
            url: '{{ URL::asset("publicar/listarCarrocerias") }}',
            type: "get",
            success: function (data) {
                $('#carroceria')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">-- Elige Carroceria --</option>')
                    .val('');
                
                var carrocerias = JSON.parse(data);
                for (i = 0; i < carrocerias.length; i++) {
                    $(new Option(carrocerias[i].carroceria, carrocerias[i].carroceria)).appendTo('#carroceria');
                }
            }
        });
    }
}

function listarVersionInicial(marca,year,combustible,modelo, carroceria,version){
    //compruebo que los 4 campos tengan datos, sino no hacemos nada
    if (marca !== '' && year !== '' && combustible !== '' && modelo !== '' && carroceria !== '') {
        $.ajax({
            data: {"marca": marca, "year": year, "combustible": combustible, "modelo": modelo, "carroceria": carroceria},
            url: '{{ URL::asset("publicar/listarVersiones") }}',
            type: "get",
            success: function (data) {
                $('#version')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">-- Elige Versión --</option>')
                    .val('');
                
                var versiones = JSON.parse(data);
                for (i = 0; i < versiones.length; i++) {
                    //$(new Option(versiones[i].version, versiones[i].version)).appendTo('#version');
                    if(versiones[i].version === version){
                        $('#version').append('<option value="'+versiones[i].version+'" selected>'+versiones[i].version+'</option>');
                    }else{
                        $('#version').append('<option value="'+versiones[i].version+'">'+versiones[i].version+'</option>');
                    }
                }
            }
        });
    }
}

function listarVersion(marca,year,combustible,modelo, carroceria){
    //compruebo que los 4 campos tengan datos, sino no hacemos nada
    if (marca !== '' && year !== '' && combustible !== '' && modelo !== '' && carroceria !== '') {
        $.ajax({
            data: {"marca": marca, "year": year, "combustible": combustible, "modelo": modelo, "carroceria": carroceria},
            url: '{{ URL::asset("publicar/listarVersiones") }}',
            type: "get",
            success: function (data) {
                $('#version')
                    .find('option')
                    .remove()
                    .end()
                    .append('<option value="">-- Elige Versión --</option>')
                    .val('');
                
                var versiones = JSON.parse(data);
                for (i = 0; i < versiones.length; i++) {
                    $(new Option(versiones[i].version, versiones[i].version)).appendTo('#version');
                }
            }
        });
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
            <th style="width: 10%;">Fecha1</th>
            <th style="width: 15%;">Marca</th>
            <th style="width: 15%;">Modelo</th>
            <th style="width: 15%;">Carroceria</th>
            <th style="width: 10%;">Versión</th>
            <th style="width: 5%;">Año</th>
            <th style="width: 10%;">Kilometros</th>
            <th style="width: 10%;">Precio</th>
            <th style="width: 5%;"></th>
            <th style="width: 5%;"></th>
        </tr>
    </thead>
    <tbody>
    <?php
    for ($i = 0; $i < count($arResult); $i++) {
        if((string)$arResult[$i]['status'] === '2'){
            $url="javascript:leerAnuncio('".$arResult[$i]['idAnuncio']."','".$arResult[$i]['idModelo']."');";
        }else{
            $url="";
        }
        ?>
        <tr>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $arResult[$i]['fecha'] }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $arResult[$i]['marca'] }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $arResult[$i]['modelo'] }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $arResult[$i]['carroceria'] }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $arResult[$i]['version'] }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $arResult[$i]['year'] }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $arResult[$i]['kilometros'] }}
            </td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $arResult[$i]['precio'] }}
            </td>
            <td>
                <?php if((string)$arResult[$i]['status'] === '2'){ ?>
                    <button type="button" onclick="pasarConfirmado({{ $arResult[$i]['idAnuncio'] }})" class="btn btn-xs btn-success">OK</button>
                <?php } ?>
            </td>
            <td>
                <button type="button" onclick="borrarModelo({{ $arResult[$i]['idAnuncio'] }})" class="btn btn-xs btn-danger">X</button>
            </td>
        </tr>
        <?php
        }
    ?>
    </tbody>
</table>

<hr/>
<h4>Detalles del anuncio</h4>
<br/>

<style type="text/css">
#productForm .inputGroupContainer .form-control-feedback,
#productForm .selectContainer .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>

<form role="form" class="form-horizontal" id="anuncioForm" name="anuncioForm" action="{{ URL::asset('admin/anuncios') }}" method="post">
     <!--CSRF Token--> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-3 control-label" for="marca">Marca</label>
        <div class="col-md-4">
            <select class="form-control" id="marca" name="marca" onchange="listarModelosMarca(this.value,$('#year').val(),$('#combustible').val());">
                <option value="">-- Elige Marca --</option>
                @foreach ($modelos as $modelo)
                    <option value="{{ $modelo->marca }}">{{ $modelo->marca }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="year">Año</label>
        <div class="col-md-4">
            <select class="form-control" id="year" name="year" onchange="listarModelosMarca($('#marca').val(),this.value,$('#combustible').val());">
                <option value="">-- Selecciona --</option>
                @for ($i = 1981; $i <= 2016; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="combustible">Combustible</label>
        <div class="col-md-4">
            <select class="form-control" id="combustible" name="combustible" onchange="listarModelosMarca($('#marca').val(),$('#year').val(),this.value);">
                <option value="">-- Elige Combustible --</option>
                <option value="Gasolina">Gasolina</option>
                <option value="Diesel">Diesel</option>
                <option value="Electrico/Hibrido">Electrico/Hibrido</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="modelo">Modelo</label>
        <div class="col-md-4">
            <select class="form-control" id="modelo" name="modelo" 
                    onchange="listarCarroceria($('#marca').val(),$('#year').val(),$('#combustible').val(),this.value);">
                <option value="">-- Selecciona --</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="carroceria">Carroceria</label>
        <div class="col-md-4">
            <select class="form-control" id="carroceria" name="carroceria" 
                    onchange="listarVersion($('#marca').val(),$('#year').val(),$('#combustible').val(),$('#modelo').val(),this.value);">
                <option value="">-- Selecciona --</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="version">Versión</label>
        <div class="col-md-4">
            <select class="form-control" id="version" name="version" 
                    onchange="">
                <option value="">-- Selecciona --</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="kilometros">Kilómetros</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="kilometros" name="kilometros" maxlength="20">
        </div>
        <label class="col-md-3 control-label">Coches nuevos Km=0, 2ª Mano Km>0 </label>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="tipo_cambio">Tipo de Cambio</label>
        <div class="col-md-4">
            <select class="form-control" id="tipo_cambio" name="tipo_cambio" 
                    onchange="">
                <option value="">-- Selecciona --</option>
                <option value="Manual">Manual</option>
                <option value="Automatico">Automatico</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="observaciones">Descripción</label>
        <div class="col-md-4">
            <textarea class="form-control" rows="4" name="observaciones" id="observaciones"></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="color">Color</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="color" name="color" maxlength="50">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="precio">Precio</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="precio" name="precio" maxlength="15">
        </div>
        <label class="col-md-1 control-label"><div align="left">€</div></label>
    </div>

    
    <h4 class="page-header">Youtube</h4>

    <div class="form-group">
        <label class="col-md-3 control-label" for="youtube_url">Url video youtube</label>
        <div class="col-md-9">
            <input type="text" class="form-control" id="youtube_url" name="youtube_url" maxlength="200">
        </div>
    </div>
    
    
    <br/>

    <h4 class="page-header"><span id="tituloForm"></span></h4>


    <div class="form-group">
        <label class="col-md-3 control-label" id="txtP1"></label>
        <div class="col-md-5">
            <input type="text" class="form-control" id="P1" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" id="txtP2"></label>
        <div class="col-md-5">
            <input type="text" class="form-control" id="P2" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" id="txtP3"></label>
        <div class="col-md-5">
            <input type="text" class="form-control" id="P3" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" id="txtP4"></label>
        <div class="col-md-5">
            <input type="text" class="form-control" id="P4" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" id="txtP5"></label>
        <div class="col-md-5">
            <input type="text" class="form-control" id="P5" disabled>
        </div>
    </div>

    
    
    
    
    <br/>

    <div id="btnOK" style="display: none;">
        <input type="hidden" id="Id" name="Id" value="" />
        <input type="submit" id="submitir" class="btn btn-primary" value="OK"/>
    </div>
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



