<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Input;
use Illuminate\Http\Request;

use App\Http\Controllers\adminController;

use App\Empresa;
use App\Usuario;
use App\OpcionPerfiles;


class empresaController extends Controller {

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


    
    public function empresasMain() {
        //control de sesion
        $admin = new adminController();
        if (!$admin->getControl()) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse..</font>');
        }

        $OK = $admin->opcion_perfiles('menuEmpresa',Session::get('idPerfil'));
        
        if($OK === true){
            //listado de las empresas actuales
            $arResult = Empresa::all();
            
            return view('admin.empresasMain')->with('arResult',$arResult); 
        }else{
            return view('admin.main')->with('errores','Usted no tiene suficientes permisos para esta opción'); 
        }
    }
    
    public function empresasAltaEdit(Request $request) {
        //var_dump($request);die;
        
        //control de sesion
        $admin = new adminController();
        if (!$admin->getControl()) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse..</font>');
        }
            

        //si es nuevo este valor viene vacio
        if($request->Id === ""){
            $empresa = new Empresa();
            $ok = 'Se ha dado de alta correctamente la empresa.';
            $error = 'ERROR al dar de alta la empresa.';
            
            //compruebo que no exista el nick de empresa, si existe vuelvo al formulario con los datos cargados
            $existeMotivo = Empresa::where('empresa','=',$request->empresa)->count();
            if($existeMotivo>0){
                //como existe vuelvo al formulario cargando los datos
                return redirect()->back()->withInput()->with('errors','El nick de empresa ya existe, intentalo con otro');
            }
            
            //guardo los datos
            $empresa->empresa = $request->empresa;
        }
        //sino se edita este Id
        else{
            $empresa = Empresa::find($request->Id);
            $ok = 'Se ha editado correctamente la empresa.';
            $error = 'ERROR al editar la empresa.';
        }

        
        
        //guardo los datos (comunes a editar o insertar nuevo)
        $empresa->pass = $request->pass;
        $empresa->nombre = $request->nombre;
        $empresa->direccion = $request->direccion;
        $empresa->localidad = $request->localidad;
        $empresa->provincia = $request->provincia;
        $empresa->CP = $request->CP;
        $empresa->pais = $request->pais;
        $empresa->CIFNIF = $request->CIFNIF;
        $empresa->fechaStatus = date('Y-m-d H:i:s');

            
        if($empresa->save()){
            return redirect('admin/empresas')->with('errors', $ok);
        }else{
            return redirect('admin/empresas')->with('errors', $error);
        }
    }
    
    
    public function empresaShow(){
        $empresa = Empresa::find(Input::get('Id'));
        
        
        //preparo array para devolver datos
        $datos['Id'] = $empresa->idEmpresa;
        $datos['empresa'] = $empresa->empresa;
        $datos['pass'] = $empresa->pass;
        $datos['nombre'] = $empresa->nombre;
        $datos['direccion'] = $empresa->direccion;
        $datos['localidad'] = $empresa->localidad;
        $datos['provincia'] = $empresa->provincia;
        $datos['CP'] = $empresa->CP;
        $datos['pais'] = $empresa->pais;
        $datos['CIFNIF'] = $empresa->CIFNIF;

        //devuelvo la respuesta al send
        echo json_encode($datos);
    }    
    
}
