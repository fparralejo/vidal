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


class parteController extends Controller {

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


    
    public function listado() {

        $json = file_get_contents('http://parraphp.esy.es/parte/public/restful/listar/7');
        $listado = json_decode($json);
        
        return view('parte.partesMain')->with('arResult',$listado); 
    }
    
//    public function perfilesAltaEdit(Request $request) {
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
//            $perfil = new Perfil();
//            $ok = 'Se ha dado de alta correctamente el perfil.';
//            $error = 'ERROR al dar de alta el perfil.';
//            
//            //compruebo que no exista el perfil, si existe vuelvo al formulario con los datos cargados
//            $existePerfil = Perfil::where('perfil','=',$request->perfil)->where('status','=','1')->count();
//            if($existePerfil>0){
//                //como existe vuelvo al formulario cargando los datos
//                return redirect()->back()->withInput()->with('errors','El perfil ya existe, intentalo con otro');
//            }
//        }
//        //sino se edita este Id
//        else{
//            $perfil = Perfil::find($request->Id);
//            $ok = 'Se ha editado correctamente el perfil.';
//            $error = 'ERROR al editar el perfil.';
//        }
//
//        
//        
//        //guardo los datos (comunes a editar o insertar nuevo)
//        $perfil->perfil = $request->perfil;
//        $perfil->fechaStatus = date('Y-m-d H:i:s');
//
//            
//        if($perfil->save()){
//            return redirect('admin/perfiles')->with('errors', $ok);
//        }else{
//            return redirect('admin/perfiles')->with('errors', $error);
//        }
//    }
//    
//    
//    public function perfilDelete(){
//        $perfil = Perfil::find(Input::get('Id'));
//        $txtUsuario = $perfil->perfil;
//
//        //cambio el campo status = 0
//        
//        $perfil->status = 0;
//        
//        if($perfil->save()){
//            echo "Perfil ". $txtUsuario ." borrado.";
//        }else{
//            echo "Perfil ". $txtUsuario ." NO ha sido borrado.";
//        }
//    }
}
