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

//Route::get('/', function () {
//    return view('main');
//});
Route::get('/', 'mainController@listado');


//para ver el parte
Route::get('parte', 'parteController@listado');

//ADMIN
//admin
Route::get('admin', function () {
    return view('admin/login');
});

Route::post('admin/login', 'adminController@login');
Route::get('admin/logout', 'adminController@logout');
Route::get('admin/main', 'adminController@main');

//empresas
Route::get('admin/empresas', 'empresaController@empresasMain');
Route::post('admin/empresas', 'empresaController@empresasAltaEdit');
Route::get('admin/empresa/show', 'empresaController@empresaShow');

//usuarios
Route::get('admin/usuarios', 'usuarioController@usuariosMain');
Route::post('admin/usuarios', 'usuarioController@usuariosAltaEdit');
Route::get('admin/usuario/show', 'usuarioController@usuarioShow');
Route::get('admin/usuario/delete', 'usuarioController@usuarioDelete');

//perfiles
Route::get('admin/perfiles', 'perfilesController@perfilesMain');
Route::post('admin/perfiles', 'perfilesController@perfilesAltaEdit');
Route::get('admin/perfil/delete', 'perfilesController@perfilDelete');

//asignacion perfiles
Route::get('admin/asig_perfiles', 'asigperfilesController@asigperfilesMain');
Route::post('admin/asig_perfiles', 'asigperfilesController@asigperfilesActualizar');

//marcas y modelos de coches
Route::get('admin/modelos', 'modeloController@modelosMain');
Route::post('admin/modelos', 'modeloController@modelosAltaEdit');
Route::get('admin/modelo/show', 'modeloController@modeloShow');
Route::get('admin/modelo/delete', 'modeloController@modeloDelete');
Route::get('admin/modelo/copy', 'modeloController@modeloCopy');

//marcas y modelos de coches
Route::get('admin/anuncios', 'anunciosController@anunciosShow');



//APP
//publicar
Route::get('publicar', 'publicarController@publicarMain');
Route::post('publicar', 'publicarController@publicarAlta');
Route::get('publicar/terminado', function () {
    return view('publicar_terminado');
});
Route::get('publicar/listarModelos', 'publicarController@modelosShow');//AJAX
Route::get('publicar/listarCarrocerias', 'publicarController@carroceriasShow');//AJAX
Route::get('publicar/listarVersiones', 'publicarController@versionesShow');//AJAX

Route::get('condiciones-uso', function () {
    return view('condiciones_uso');
});





//if ($e instanceof NotFoundHttpException)
//{
//    return view('admin/main');
//}