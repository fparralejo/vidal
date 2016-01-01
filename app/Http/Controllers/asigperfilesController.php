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


class asigperfilesController extends Controller {

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


    
    public function asigperfilesMain() {
        //control de sesion
        $admin = new adminController();
        if (!$admin->getControl()) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse..</font>');
        }

        $OK = $admin->opcion_perfiles('menuAsigPerfil',Session::get('idPerfil'));
        
        if($OK === true){
            //listado de los usuarios actuales
            $listOpciones = OpcionPerfiles::all();
            //listado de los perfiles actuales
            $listPerfiles = Perfil::where('status','=','1')->get();
            
            //preparo el array de datos para presentar
            $datos = "";
            foreach ($listOpciones as $opcion) {
                $dato['id'] = $opcion->id;
                $dato['opcion'] = $opcion->opcion;
                $dato['perfiles'] = explode(',',$opcion->perfiles);
                $datos[] = $dato;
            }
            
            //dd($datos);die;
            return view('admin.asigperfilesMain')->with('datos',$datos)
                                                 ->with('listPerfiles',$listPerfiles); 
        }else{
            return view('admin.main')->with('errores','Usted no tiene suficientes permisos para esta opción'); 
        }
    }
    
    public function asigperfilesActualizar(Request $request) {
        //echo $request->op_1_2;die;
        
        //control de sesion
        $admin = new adminController();
        if (!$admin->getControl()) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse..</font>');
        }
           
        //listamos los perfiles
        $listPerfiles = Perfil::where('status','=','1')->get();
        //listamos las opciones de los perfiles
        $listOpciones =  OpcionPerfiles::all();
        
        //recojo los datos del request
        // hago dos bucles, el externo recorre las opciones y el interno los perfiles
        //asi genero la tabla (array) de todas las opciones
        foreach ($listOpciones as $opcion) {
            $listPerfilesNuevos = "";
            foreach ($listPerfiles as $perfil) {
                $posicion = 'op_'.$opcion->id.'_'.$perfil->idPerfil;
                $valor = $request->$posicion;
                //si viene "on" es = 1, si viene vacio es = 0
                if($valor === 'on'){
                    $listPerfilesNuevos[] = $perfil->idPerfil;
                }
            }
            $listPerfilesNuevos = implode(',',$listPerfilesNuevos);
            
            //por utlimo actualizo esa linea de la tabla opciones_perfiles
            $datosOpcion = OpcionPerfiles::find($opcion->id);
            $datosOpcion->perfiles = $listPerfilesNuevos;
            $datosOpcion->save();
        }

        
        $ok = 'Se ha actualizado las asignaciones de las opciones.';
        return redirect('admin/asig_perfiles')->with('errors', $ok);
    }
    
    
}
