@extends('layout_publicar')


@section('principal')
<script>
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

</script>

<h4 class="page-header">Detalles de tu anuncio</h4>

<form role="form" class="form-horizontal" id="publicarForm" name="publicarForm" action="{{ URL::asset('publicar') }}" method="post" enctype="multipart/form-data">
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
            <select class="form-control" id="kilometros" name="kilometros" onchange="">
                <option value="">-- Selecciona --</option>
                <option value="1">0 -4.999</option>
                <option value="2" >5.000 - 9.999</option>
                <option value="3" >10.000 - 14.999</option>
                <option value="4" >15.000 - 19.999</option>
                <option value="5" >20.000 - 24.999</option>
                <option value="6" >25.000 - 29.999</option>
                <option value="7" >30.000 - 34.999</option>
                <option value="8" >35.000 - 39.999</option>
                <option value="9" >40.000 - 44.999</option>
                <option value="10" >45.000 - 49.999</option>
                <option value="11" >50.000 - 54.999</option>
                <option value="12" >55.000 - 59.999</option>
                <option value="13" >60.000 - 64.999</option>
                <option value="14" >65.000 - 69.999</option>
                <option value="15" >70.000 - 74.999</option>
                <option value="16" >75.000 - 79.999</option>
                <option value="17" >80.000 - 84.999</option>
                <option value="18" >85.000 - 89.999</option>
                <option value="19" >90.000 - 94.999</option>
                <option value="20" >95.000 - 99.999</option>
                <option value="21" >100.000 - 109.999</option>
                <option value="22" >110.000 - 119.999</option>
                <option value="23" >120.000 - 129.999</option>
                <option value="24" >130.000 - 139.999</option>
                <option value="25" >140.000 - 149.999</option>
                <option value="26" >150.000 - 159.999</option>
                <option value="27" >160.000 - 169.999</option>
                <option value="28" >170.000 - 179.999</option>
                <option value="29" >180.000 - 189.999</option>
                <option value="30" >190.000 - 199.999</option>
                <option value="31" >Más de 200.000</option>
            </select>
        </div>
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
        <label class="col-md-3 control-label" for="precio">Precio</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="precio" name="precio" maxlength="15">
        </div>
        <label class="col-md-1 control-label"><div align="left">€</div></label>
    </div>
    
    <h4 class="page-header">Detalles de tu anuncio</h4>

    
    
</form>




<script>
$(document).ready(function() {
    $('#productForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
//            id_oferta: {
//                validators: {
//                    notEmpty: {
//                        message: 'El Id Oferta es requerido'
//                    },
//                    numeric: {
//                        message: 'El Id Oferta tiene que ser un valor numérico'
//                    }
//                }
//            },
            oferta: {
                validators: {
                    notEmpty: {
                        message: 'La Oferta de trabajo es requerida'
                    }
                }
            },
            descripcion: {
                validators: {
                    notEmpty: {
                        message: 'La descripción de trabajo es requerida'
                    }
                }
            },
            empresa: {
                validators: {
                    notEmpty: {
                        message: 'La empresa de trabajo es requerida'
                    }
                }
            }
        }
    });
});
</script>
@stop
