@extends('admin.layout')


@section('principal')
<img src="{{URL::asset('images/logo1.gif')}}" style="max-width:300px;" class="img-responsive">
<br/>
<br/>
<br/>

<?php
if(!empty($errores)){
?>
<div class="alert alert-warning" id="accionTabla2" role="alert" style="display: block; ">
        {{ $errores }}
</div>
<?php
}
?>
@stop



