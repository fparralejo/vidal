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

<form role="form" class="form-horizontal" id="publicarForm" name="publicarForm" action="{{ URL::asset('publicar') }}" method="post">
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
                    onchange="listarVersion($('#marca').val(),$('#year').val(),$('#combustible').val(),$('#carroceria').val(),this.value);">
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
    
    
    
</form>
@stop
