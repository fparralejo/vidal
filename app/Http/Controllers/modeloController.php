<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Input;
use Illuminate\Http\Request;

use App\Http\Controllers\adminController;

use App\Empresa;
use App\Usuario;
use App\Perfil;
use App\OpcionPerfiles;
use App\Modelo;


class modeloController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


    
    public function modelosMain() {
        //control de sesion
        $admin = new adminController();
        if (!$admin->getControl()) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse..</font>');
        }

        $OK = $admin->opcion_perfiles('menuModelo',Session::get('idPerfil'));
        
        if($OK === true){
            //listado de los modelos actuales
            $arResult = Modelo::where('status','=','1')->get();
            
            return view('admin.modelosMain')->with('arResult',$arResult); 
        }else{
            return view('admin.main')->with('errores','Usted no tiene suficientes permisos para esta opción'); 
        }
    }
    
    public function modelosAltaEdit(Request $request) {
        //var_dump($request);die;
        
        //control de sesion
        $admin = new adminController();
        if (!$admin->getControl()) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse..</font>');
        }
            

        //si es nuevo este valor viene vacio
        if($request->Id === ""){
            $modelo = new Modelo();
            $ok = 'Se ha dado de alta correctamente el modelo.';
            $error = 'ERROR al dar de alta el modelo.';
        }
        //sino se edita este Id
        else{
            $modelo = Modelo::find($request->Id);
            $ok = 'Se ha editado correctamente el modelo.';
            $error = 'ERROR al editar el modelo.';
        }

        
        
        //guardo los datos (comunes a editar o insertar nuevo)
        $modelo->marca = $request->marca;
        $modelo->year_inicio = $request->year_inicio;
        $modelo->year_fin = $request->year_fin;
        $modelo->combustible = $request->combustible;
        $modelo->modelo = $request->modelo;
        $modelo->carroceria = $request->carroceria;
        $modelo->version = $request->version;
        $modelo->tipo_cambio = $request->tipo_cambio;
        $modelo->fechaStatus = date('Y-m-d H:i:s');

            
        if($modelo->save()){
            return redirect('admin/modelos')->with('errors', $ok);
        }else{
            return redirect('admin/modelos')->with('errors', $error);
        }
    }
    
    
    public function modeloShow(){
        $modelo = Modelo::find(Input::get('Id'));
        
        
        //preparo array para devolver datos
        $datos['Id'] = $modelo->idModelo;
        $datos['marca'] = $modelo->marca;
        $datos['year_inicio'] = $modelo->year_inicio;
        $datos['year_fin'] = $modelo->year_fin;
        $datos['combustible'] = $modelo->combustible;
        $datos['modelo'] = $modelo->modelo;
        $datos['carroceria'] = $modelo->carroceria;
        $datos['version'] = $modelo->version;
        $datos['tipo_cambio'] = $modelo->tipo_cambio;

        //devuelvo la respuesta al send
        echo json_encode($datos);
    }    
    
    public function modeloDelete(){
        $modelo = Modelo::find(Input::get('Id'));
        $txtUsuario = $modelo->idModelo;

        //cambio el campo status = 0
        
        $modelo->status = 0;
        
        if($modelo->save()){
            echo "Modelo ". $txtUsuario ." borrado.";
        }else{
            echo "Modelo ". $txtUsuario ." NO ha sido borrado.";
        }
    }
    
    public function modeloCopy(){
        $modelo_a_copiar = Modelo::find(Input::get('Id'));
        $txtUsuario = $modelo_a_copiar->idModelo;

        //modelo nuevo
        $modelo_nuevo = new Modelo();
        
        $modelo_nuevo->marca = $modelo_a_copiar->marca;
        $modelo_nuevo->year_inicio = $modelo_a_copiar->year_inicio;
        $modelo_nuevo->year_fin = $modelo_a_copiar->year_fin;
        $modelo_nuevo->combustible = $modelo_a_copiar->combustible;
        $modelo_nuevo->modelo = $modelo_a_copiar->modelo;
        $modelo_nuevo->carroceria = $modelo_a_copiar->carroceria;
        $modelo_nuevo->version = $modelo_a_copiar->version;
        $modelo_nuevo->tipo_cambio = $modelo_a_copiar->tipo_cambio;
        $modelo_nuevo->fechaStatus = date('Y-m-d H:i:s');
        
        
        if($modelo_nuevo->save()){
            echo "Modelo " . $txtUsuario . " copiado al " . $modelo_nuevo->idModelo;
        }else{
            echo "Modelo " . $txtUsuario . " NO ha sido copiado.";
        }
    }
    
}
