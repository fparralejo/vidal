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


class usuarioController extends Controller {

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


    
    public function usuariosMain() {
        //control de sesion
        $admin = new adminController();
        if (!$admin->getControl()) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse..</font>');
        }

        $OK = $admin->opcion_perfiles('menuUsuario',Session::get('idPerfil'));
        
        if($OK === true){
            //listado de los usuarios actuales
            $arResult = Usuario::where('status','=','1')->get();
            //listado de empresas
            $listEmpresas = Empresa::all();
            //listado de los perfiles actuales
            $listPerfiles = Perfil::where('status','=','1')->get();
            
            return view('admin.usuariosMain')->with('arResult',$arResult)
                                             ->with('listEmpresas',$listEmpresas)
                                             ->with('listPerfiles',$listPerfiles); 
        }else{
            return view('admin.main')->with('errores','Usted no tiene suficientes permisos para esta opción'); 
        }
    }
    
    public function usuariosAltaEdit(Request $request) {
        //var_dump($request);die;
        
        //control de sesion
        $admin = new adminController();
        if (!$admin->getControl()) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse..</font>');
        }
            

        //si es nuevo este valor viene vacio
        if($request->Id === ""){
            $usuario = new Usuario();
            $ok = 'Se ha dado de alta correctamente el usuario.';
            $error = 'ERROR al dar de alta el usuario.';
            
            //compruebo que no exista el nick del usuario, si existe vuelvo al formulario con los datos cargados
            $existeUsuario = Usuario::where('usuario','=',$request->usuario)->where('status','=','1')->count();
            if($existeUsuario>0){
                //como existe vuelvo al formulario cargando los datos
                return redirect()->back()->withInput()->with('errors','El nick del usuario ya existe, intentalo con otro');
            }
            
            //guardo los datos
            $usuario->usuario = $request->usuario;
        }
        //sino se edita este Id
        else{
            $usuario = Usuario::find($request->Id);
            $ok = 'Se ha editado correctamente el usuario.';
            $error = 'ERROR al editar el usuario.';
        }

        
        
        //guardo los datos (comunes a editar o insertar nuevo)
        $usuario->idEmpresa = $request->idEmpresa;
        $usuario->usuario = $request->usuario;
        $usuario->pass = $request->pass;
        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->NIF = $request->NIF;
        $usuario->idPerfil = $request->idPerfil;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->fechaStatus = date('Y-m-d H:i:s');

            
        if($usuario->save()){
            return redirect('admin/usuarios')->with('errors', $ok);
        }else{
            return redirect('admin/usuarios')->with('errors', $error);
        }
    }
    
    
    public function usuarioShow(){
        $usuario = Usuario::find(Input::get('Id'));
        
        
        //preparo array para devolver datos
        $datos['Id'] = $usuario->idUsuario;
        $datos['idEmpresa'] = $usuario->idEmpresa;
        $datos['usuario'] = $usuario->usuario;
        $datos['pass'] = $usuario->pass;
        $datos['nombre'] = $usuario->nombre;
        $datos['apellidos'] = $usuario->apellidos;
        $datos['NIF'] = $usuario->NIF;
        $datos['idPerfil'] = $usuario->idPerfil;
        $datos['CP'] = $usuario->CP;
        $datos['email'] = $usuario->email;
        $datos['telefono'] = $usuario->telefono;

        //devuelvo la respuesta al send
        echo json_encode($datos);
    }    
    
    public function usuarioDelete(){
        $usuario = Usuario::find(Input::get('Id'));
        $txtUsuario = $usuario->nombre . ' ' . $usuario->apellidos;

        //cambio el campo status = 0
        
        $usuario->status = 0;
        
        if($usuario->save()){
            echo "Usuario ". $txtUsuario ." borrado.";
        }else{
            echo "Usuario ". $txtUsuario ." NO ha sido borrado.";
        }
    }
}
