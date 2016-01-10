@extends('layout_publicar')


@section('principal')
<script type="text/javascript" charset="utf-8">
//hacer desaparecer en cartel
$(document).ready(function() {
    
});
</script>


<h4 class="page-header">Anuncio publicado</h4>

 <!--aviso de alguna accion--> 
<div class="alert alert-success" role="alert" id="accionTabla" style="display: none; ">
</div>

@if (Session::has('errors'))
<div class="alert alert-success" id="accionTabla2" role="alert" style="display: block; ">
{{ $errors }}
</div>
@endif

@stop