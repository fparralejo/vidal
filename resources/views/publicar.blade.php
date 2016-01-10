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
    
    <div class="form-group">
        <label class="col-md-3 control-label"></label>
        <div class="col-md-8">
            <img src="{{ URL::asset("images/youtube_url.png") }}" alt="Url de Youtube" style="height: 225px; width: 75%;">
        </div>
    </div>
    
    
    <h4 class="page-header">Datos para que te contacten</h4>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="nombre">Tu nombre</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="150">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="poblacion">Poblacion</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="poblacion" name="poblacion" maxlength="100">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-3 control-label" for="provincia">Provincia</label>
        <div class="col-md-4">
            <select class="form-control" id="marca" name="provincia">
                <option value="">-- Elige Provincia --</option>
                @foreach ($provincias as $provincia)
                    <option value="{{ $provincia->nombre }}">{{ $provincia->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="email">E-mail</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="email" name="email" maxlength="100">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="email2">Confirmar E-mail</label>
        <div class="col-md-4">
            <input type="text" class="form-control" id="email2" name="email2" maxlength="100">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="telefono">Telefono</label>
        <div class="col-md-3">
            <input type="text" class="form-control" id="telefono" name="telefono" maxlength="20">
        </div>
    </div>
    
    <div class="form-group">
        
        <div class="col-md-3 control-label">
        </div>
        <div class="col-md-6">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="condiciones_uso" name="condiciones_uso" value="1"  />
                    <label id="lcondiciones_uso" for="condiciones_uso"> Acepto las </label>
                    <a href="condiciones-uso" target="_blank">condiciones de uso y la Pol&iacute;tica de Privacidad</a>
                </label>
            </div>        
        </div>        

        
<!--        <div class="col-md-6">
            <input type="checkbox" id="condiciones_uso" name="condiciones_uso" value="1"  />
            <label id="lcondiciones_uso" for="condiciones_uso"> Acepto las </label>
            <a href="condiciones-uso" target="_blank">condiciones de uso y la Pol&iacute;tica de Privacidad</a>
        </div>-->
    </div>
    
    <div class="form-group">
        <div class="col-md-3 control-label">
        </div>
        <div class="col-md-6">
            <input type="submit" id="submitir" class="btn btn-primary" value="Publica Tu Anuncio"/>
        </div>
    </div>
</form>




<script>
$(document).ready(function() {
    $('#publicarForm').formValidation({
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
                        message: 'Debe seleccionar una marca'
                    }
                }
            },
            year: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar un año'
                    }
                }
            },
            combustible: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar el combustible que consume'
                    }
                }
            },
            modelo: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar un modelo'
                    }
                }
            },
            carroceria: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar una carroceria'
                    }
                }
            },
            version: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar una versión'
                    }
                }
            },
            kilometros: {
                validators: {
                    notEmpty: {
                        message: 'Escoje los kilometros actuales'
                    }
                }
            },
            tipo_cambio: {
                validators: {
                    notEmpty: {
                        message: 'Escoje el tipo de cambio'
                    }
                }
            },
            observaciones: {
                validators: {
                    notEmpty: {
                        message: 'Indique el estado del producto, sus características y toda la información que puede ser de ayuda para los compradores'
                    }
                }
            },
            color: {
                validators: {
                    notEmpty: {
                        message: 'Indique el color'
                    }
                }
            },
            precio: {
                validators: {
                    notEmpty: {
                        message: 'Indique el precio'
                    },
                    numeric: {
                        message: 'El precio debe ser numérico'
                    }
                }
            },
            youtube_url: {
                validators: {
                    notEmpty: {
                        message: 'Indique la url del video de youtube'
                    },
                    uri: {
                        message: 'La url del video de youtube, debe ser correcta'
                    }
                }
            },
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'Indique el nombre'
                    }
                }
            },
            poblacion: {
                validators: {
                    notEmpty: {
                        message: 'Indique la población'
                    }
                }
            },
            provincia: {
                validators: {
                    notEmpty: {
                        message: 'Indique la provincia'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Indique un e-mail de contacto'
                    },
                    emailAddress: {
                        message: 'Debe ser un e-mail correcto'
                    }                    
                }
            },
            email2: {
                validators: {
                    notEmpty: {
                        message: 'Indique un e-mail de contacto'
                    },
                    emailAddress: {
                        message: 'Debe ser un e-mail correcto'
                    },
                    identical: {
                        field: 'email',
                        message: 'Este e-mail tiene que ser igual al campo E-mail'
                    }
                }
            },
            telefono: {
                validators: {
                    notEmpty: {
                        message: 'Indique un teléfono'
                    }
                }
            },
            condiciones_uso: {
                validators: {
                    notEmpty: {
                        message: 'Debes aceptar las condiciones de uso.'
                    }
                }
            }
        }
    });
});
</script>
@stop
