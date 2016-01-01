<?php
//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('main');
});


//admin
Route::get('admin', function () {
    return view('admin/login');
});

Route::post('admin/login', 'adminController@login');
Route::get('admin/logout', 'adminController@logout');
Route::get('admin/main', 'adminController@main');

Route::get('admin/empresas', 'empresaController@empresasMain');
Route::post('admin/empresas', 'empresaController@empresasAltaEdit');
Route::get('admin/empresa/show', 'empresaController@empresaShow');


Route::get('admin/usuarios', 'usuarioController@usuariosMain');
Route::post('admin/usuarios', 'usuarioController@usuariosAltaEdit');
Route::get('admin/usuario/show', 'usuarioController@usuarioShow');
Route::get('admin/usuario/delete', 'usuarioController@usuarioDelete');



//if ($e instanceof NotFoundHttpException)
//{
//    return view('admin/main');
//}