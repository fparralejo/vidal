@extends('admin.layout')


@section('principal')
<h4 class="page-header">Empresas</h4>

<style>
    .sgsiRow:hover{
        cursor: pointer;
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



//        function volver(){
//            window.location = '{{ URL::asset("main") }}';
//        }

        
</script>


 <!--aviso de alguna accion--> 
<div class="alert alert-success" role="alert" id="accionTabla" style="display: none; ">
</div>

<!--@if (Session::has('errors'))
<div class="alert alert-success" id="accionTabla2" role="alert" style="display: block; ">
{{ $errors }}
</div>
@endif-->

<?php

//dd($arResult);die;
?>

<table id="ejemplo1" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Localidad</th>
            <th>Provincia</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($arResult as $empresa)
        <tr>
            <td class="sgsiRow" onClick="">{{ $empresa->idEmpresa }}</td>
            <td class="sgsiRow" onClick="">
                <div align="right">
                    {{ $empresa->nombre }}
                </div>
            </td>
            <td class="sgsiRow" onClick="">
                <div align="right">
                    {{ $empresa->localidad }}
                </div>
            </td>
            <td class="sgsiRow" onClick="">
                <div align="right">
                    {{ $empresa->provincia }}
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



@stop



