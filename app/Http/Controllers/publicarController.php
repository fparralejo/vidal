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


class publicarController extends Controller {

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


    
    public function publicarMain() {
        //listado de las marcas
        $modelos = Modelo::distinct()->select('marca')->where('status','=','1')->get();

        return view('publicar')->with('modelos',$modelos); 
    }
    
//    public function usuariosAltaEdit(Request $request) {
//        //var_dump($request);die;
//        
//        //control de sesion
//        $admin = new adminController();
//        if (!$admin->getControl()) {
//            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse..</font>');
//        }
//            
//
//        //si es nuevo este valor viene vacio
//        if($request->Id === ""){
//            $usuario = new Usuario();
//            $ok = 'Se ha dado de alta correctamente el usuario.';
//            $error = 'ERROR al dar de alta el usuario.';
//            
//            //compruebo que no exista el nick del usuario, si existe vuelvo al formulario con los datos cargados
//            $existeUsuario = Usuario::where('usuario','=',$request->usuario)->where('status','=','1')->count();
//            if($existeUsuario>0){
//                //como existe vuelvo al formulario cargando los datos
//                return redirect()->back()->withInput()->with('errors','El nick del usuario ya existe, intentalo con otro');
//            }
//            
//            //guardo los datos
//            $usuario->usuario = $request->usuario;
//        }
//        //sino se edita este Id
//        else{
//            $usuario = Usuario::find($request->Id);
//            $ok = 'Se ha editado correctamente el usuario.';
//            $error = 'ERROR al editar el usuario.';
//        }
//
//        
//        
//        //guardo los datos (comunes a editar o insertar nuevo)
//        $usuario->idEmpresa = $request->idEmpresa;
//        $usuario->usuario = $request->usuario;
//        $usuario->pass = $request->pass;
//        $usuario->nombre = $request->nombre;
//        $usuario->apellidos = $request->apellidos;
//        $usuario->NIF = $request->NIF;
//        $usuario->idPerfil = $request->idPerfil;
//        $usuario->email = $request->email;
//        $usuario->telefono = $request->telefono;
//        $usuario->fechaStatus = date('Y-m-d H:i:s');
//
//            
//        if($usuario->save()){
//            return redirect('admin/usuarios')->with('errors', $ok);
//        }else{
//            return redirect('admin/usuarios')->with('errors', $error);
//        }
//    }
    
    
    public function modelosShow(){
        $modelos = Modelo::distinct()->select('modelo')->where('marca','=',Input::get('marca'))
                                                        ->where('year','=',Input::get('year'))
                                                        ->where('combustible','=',Input::get('combustible'))
                                                        ->where('status','=','1')->get();
        
        //dd($modelos);die;
        
        //preparo array para devolver datos
        $datos = "";
        foreach ($modelos as $modelo) {
            $dato['idModelo'] = $modelo->idModelo;
            $dato['modelo'] = $modelo->modelo;
            $datos[] = $dato;
        }

        //devuelvo la respuesta al send
        echo json_encode($datos);
    }    
    
    public function carroceriasShow(){
        $carrocerias = Modelo::distinct()->select('carroceria')->where('marca','=',Input::get('marca'))
                                                        ->where('year','=',Input::get('year'))
                                                        ->where('combustible','=',Input::get('combustible'))
                                                        ->where('modelo','=',Input::get('modelo'))
                                                        ->where('status','=','1')->get();
        
        //dd($modelos);die;
        
        //preparo array para devolver datos
        $datos = "";
        foreach ($carrocerias as $carroceria) {
            $dato['carroceria'] = $carroceria->carroceria;
            $datos[] = $dato;
        }

        //devuelvo la respuesta al send
        echo json_encode($datos);
    }   
    
    public function versionesShow(){
        $versiones = Modelo::distinct()->select('version')->where('marca','=',Input::get('marca'))
                                                        ->where('year','=',Input::get('year'))
                                                        ->where('combustible','=',Input::get('combustible'))
                                                        ->where('modelo','=',Input::get('modelo'))
                                                        ->where('carroceria','=',Input::get('carroceria'))
                                                        ->where('status','=','1')->get();
        
        //dd($modelos);die;
        
        //preparo array para devolver datos
        $datos = "";
        foreach ($versiones as $version) {
            $dato['version'] = $version->version;
            $datos[] = $dato;
        }

        //devuelvo la respuesta al send
        echo json_encode($datos);
    }   
    
    
    
//    public function usuarioDelete(){
//        $usuario = Usuario::find(Input::get('Id'));
//        $txtUsuario = $usuario->nombre . ' ' . $usuario->apellidos;
//
//        //cambio el campo status = 0
//        
//        $usuario->status = 0;
//        
//        if($usuario->save()){
//            echo "Usuario ". $txtUsuario ." borrado.";
//        }else{
//            echo "Usuario ". $txtUsuario ." NO ha sido borrado.";
//        }
//    }
}
