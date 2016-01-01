<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Input;
use Illuminate\Http\Request;


use App\Empresa;
use App\Usuario;
use App\OpcionPerfiles;


class adminController extends Controller {

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


    public function main(){
        //control de sesion
        if (!$this->getControl()) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse.</font>');
        }

        return view('admin.main');
    }

    public function login(Request $request) {
        
        //busco en la tabla empresa
        $empresa = Empresa::where('empresa', '=', $request->empresa)
                          ->where('pass', '=', $request->passEmpresa)
                          ->where('status', '=', '1')
                          ->get();
        
        //sino encuentra empresa salimos con el error
        if (count($empresa) === 0) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">Datos incorrectos.</font>');
        }
        
        //ahora busco en la tabla usuarios
        $usuario = Usuario::where('usuario', '=', $request->usuario)
                          ->where('pass', '=', $request->passUsuario)
                          ->where('idEmpresa', '=', $empresa[0]->idEmpresa)
                          ->where('status', '=', '1')
                          ->get();
        
        //var_dump(count($encontrado));die;

        if (count($usuario) > 0) {
            //guardo las vbles de sesion para navegar por la app
            Session::put('id', $usuario[0]->idUsuario);
            Session::put('usuario', $usuario[0]->nombre.' '.$usuario[0]->apellidos);
            Session::put('empresa', $empresa[0]->nombre);
            Session::put('idPerfil', $usuario[0]->idPerfil);


            return redirect('admin/main');
        } else {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">Datos incorrectos.</font>');
        }
    }

    public function logout() {
        Session::flush();
        return redirect('admin');
    }

    public function getControl() {
        //controlamos si estaamos en sesion por las distintas paginas de la app
        //controlamos las vbles sesion 'nombre', 'id'
        if (Session::has('usuario') && Session::has('id') && Session::has('empresa')) {
            //chequeamos que estos valores de la empresa
            $existeEmpresa = Empresa::where('nombre', '=', Session::get('empresa'))->get();

            if (count($existeEmpresa) === 0) {
                return false;
            }
            
            //chequeamos que estos valores del usuario
            $existeUsuario = Usuario::where('idUsuario', '=', Session::get('id'))->get();
            
            if (count($existeUsuario) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function opcion_perfiles($opcion,$idPerfilUsuario) {
        $opcion_perfiles = OpcionPerfiles::all();
        
        $encontrado = 'NO';
        foreach ($opcion_perfiles as $opcion_perfil){
            if($opcion_perfil->opcion === $opcion){
                $perfiles = explode(',',$opcion_perfil->perfiles);
                if(is_array($perfiles)){
                    if(in_array($idPerfilUsuario,$perfiles)){
                        $encontrado = 'SI';
                    }else{
                        $encontrado = 'NO';
                    }
                }else{
                    $encontrado = 'NO';
                }
                break;
            }
        }
        
        if($encontrado === 'NO'){
            return false;
        }else{
            return true;
        }
    }
    
}
