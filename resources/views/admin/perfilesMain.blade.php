@extends('admin.layout')


@section('principal')
<h4 class="page-header">Perfiles</h4>

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
        { "sType": 'string' }
    ],                    
    "bJQueryUI":true,
    "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
});
} );


function borrarPerfil(Id){
    if (confirm("¿Desea borrar este perfil?"))
    {
        $.ajax({
          data:{"Id":Id},
          url: '{{ URL::asset("admin/perfil/delete") }}',
          type:"get",
          success: function(data) {
                $('#accionTabla').html(data);
                $('#accionTabla').show();
          }
        });
        setTimeout(function ()
        {
            document.location.href="{{URL::to('admin/perfiles')}}";
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


<table id="ejemplo1" class="table table-striped table-bordered table-hover tablaResponsive" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 10%;">Id</th>
            <th style="width: 70%;">Nombre Perfil</th>
            <th style="width: 10%;"></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($arResult as $perfil)
    <?php
    $url="";
    
    ?>
        <tr>
            <td class="sgsiRow" onClick="{{ $url }}">{{ $perfil->idPerfil }}</td>
            <td class="sgsiRow" onClick="{{ $url }}">
                    {{ $perfil->perfil }}
            </td>
            <td>
                <button type="button" onclick="borrarPerfil({{ $perfil->idPerfil }})" class="btn btn-xs btn-danger">Borrar</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<hr/>
<h4><span id="tituloForm">Nuevo Perfil</span></h4>
<br/>

<style type="text/css">
#productForm .inputGroupContainer .form-control-feedback,
#productForm .selectContainer .form-control-feedback {
    top: 0;
    right: -15px;
}
</style>

<form role="form" class="form-horizontal" id="perfilForm" name="perfilForm" action="{{ URL::asset('admin/perfiles') }}" method="post">
     <!--CSRF Token--> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
        <div class="col-md-10">
            <label for="perfil">Nombre Perfil</label>
            <div class="form-group">
                <input type="text" class="form-control" id="perfil" name="perfil" maxlength="50" 
                       value="{{ Input::old('perfil') }}">
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
    $('#perfilForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            perfil: {
                validators: {
                    notEmpty: {
                        message: 'El nombre del perfil es requerido'
                    }
                }
            }
        }
    });
    
    
});
</script>
    
@stop



