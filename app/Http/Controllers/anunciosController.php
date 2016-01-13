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
use App\Provincia;
use App\Contacto;
use App\Anuncio;


class anunciosController extends Controller {

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


    
    public function anunciosShow() {
        //control de sesion
        $admin = new adminController();
        if (!$admin->getControl()) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse..</font>');
        }

        $OK = $admin->opcion_perfiles('menuAnuncios',Session::get('idPerfil'));
        
        //listado de las anuncios
        $anuncios = Anuncio::where('status','<>','0')->orderBy('fechaStatus', 'ASC')->get();
        
        //genero el array con los datos que necesito
        $datos = "";
        foreach ($anuncios as $anuncio) {
            $dato['idAnuncio'] = $anuncio->idAnuncio;
            $dato['idUsuario'] = $anuncio->idUsuario;
            $dato['idContacto'] = $anuncio->idContacto;
            $dato['idModelo'] = $anuncio->idModelo;
            $modelo = Modelo::where('idModelo','=',$anuncio->idModelo)->where('status','=','1')->get();
            $dato['marca'] = $modelo[0]->marca;
            $dato['year'] = $modelo[0]->year;
            $dato['combustible'] = $modelo[0]->combustible;
            $dato['modelo'] = $modelo[0]->modelo;
            $dato['carroceria'] = $modelo[0]->carroceria;
            $dato['version'] = $modelo[0]->version;
            $dato['kilometros'] = $anuncio->kilometros;
            $dato['color'] = $anuncio->color;
            $dato['precio'] = $anuncio->precio;
            $dato['tipo_cambio'] = $anuncio->tipo_cambio;
            $dato['observaciones'] = $anuncio->observaciones;
            $dato['youtube_url'] = $anuncio->youtube_url;
            $dato['fecha'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$anuncio->fechaStatus)->format('d/m/Y');
            $dato['status'] = $anuncio->status;
            
            $datos[] = $dato;
        }
        
        //listado de las marcas
        $modelos = Modelo::distinct()->select('marca')->where('status','=','1')->get();
        //listado de las provincias
        $provincias = Provincia::all();
        
        return view('admin.anuncios')->with('arResult',$datos)->with('modelos',$modelos)->with('provincias',$provincias); 
    }
    
    
    public function anuncioShow(){
        $modelo = Modelo::find(Input::get('idModelo'));
        $anuncio = Anuncio::find(Input::get('idAnuncio'));
        
        
        //preparo array para devolver datos
        $datos['Id'] = $anuncio->idAnuncio;
        $datos['marca'] = $modelo->marca;
        $datos['year'] = $modelo->year;
        $datos['combustible'] = $modelo->combustible;
        $datos['modelo'] = $modelo->modelo;
        $datos['carroceria'] = $modelo->carroceria;
        $datos['version'] = $modelo->version;
        $datos['kilometros'] = $anuncio->kilometros;
        $datos['observaciones'] = $anuncio->observaciones;
        $datos['color'] = $anuncio->color;
        $datos['precio'] = $anuncio->precio;
        $datos['tipo_cambio'] = $anuncio->tipo_cambio;
        $datos['youtube_url'] = $anuncio->youtube_url;
        
        //ahora extraigo los datos del anunciante (puede ser contacto o usuario
        if($anuncio->idUsuario !== 0){
            //es usuario
            $usuario = Usuario::find($anuncio->idUsuario);
            $empresa = Empresa::find($usuario->idEmpresa);
            $datos['tipo'] = 'usuario';
            $datos['usuario'] = $usuario->nombre . ' ' . $usuario->apellidos;//1
            $datos['NIF'] = $usuario->NIF;//2
            $datos['email'] = $usuario->email;//5
            $datos['telefono'] = $usuario->telefono;//4
            $datos['empresa'] = $empresa->nombre;//3
            
        }else
        if($anuncio->idContacto !== 0){
            //es contacto
            $contacto = Contacto::find($anuncio->idContacto);
            $datos['tipo'] = 'contacto';
            $datos['contacto'] = $contacto->nombre;//1
            $datos['poblacion'] = $contacto->poblacion;//2
            $datos['provincia'] = $contacto->provincia;//3
            $datos['telefono'] = $contacto->telefono;//4
            $datos['email'] = $contacto->email;//5
            
        }

        //devuelvo la respuesta al send
        echo json_encode($datos);
    }    
    
    
    public function anuncioEdit(Request $request){
        //control de sesion
        $admin = new adminController();
        if (!$admin->getControl()) {
            return redirect('admin')->with('login_errors', '<font color="#ff0000">La sesión a expirado. Vuelva a logearse..</font>');
        }
        
        //actualizo los datos del anuncio
        //1º veo los datos del modelo (campos = marca, year, combustible, modelo, carroceria y version)
        $modelo = Modelo::where('marca','=',$request->marca)
                        ->where('year','=',$request->year)
                        ->where('combustible','=',$request->combustible)
                        ->where('modelo','=',$request->modelo)
                        ->where('carroceria','=',$request->carroceria)
                        ->where('version','=',$request->version)
                        ->where('status','=','1')
                        ->get();

        //compruebo que existe ese modelo, sino no se guardan los cambios, doy error
        if($modelo[0]->idModelo === 0){
            return false;
        }
        
        //guardo los cambios en el anuncio
        $anuncio = Anuncio::find($request->Id);
        
        $anuncio->idModelo = $modelo[0]->idModelo;
        $anuncio->kilometros = $request->kilometros;
        $anuncio->color = $request->color;
        $anuncio->precio = $request->precio;
        $anuncio->tipo_cambio = $request->tipo_cambio;
        $anuncio->observaciones = $request->observaciones;
        $anuncio->youtube_url = $request->youtube_url;
        $anuncio->fechaStatus = date('Y-m-d H:i:s');

            
        if($anuncio->save()){
            return redirect('admin/anuncios')->with('errors', 'Se ha actualizado  correctamente los datos del anuncio');
        }else{
            return redirect('admin/anuncios')->with('errors', 'NO se ha actualizado  correctamente los datos del anuncio');
        }
    }
    
    
    public function anuncioConfirmado(){
        $anuncio = Anuncio::find(Input::get('Id'));
        $txtAnuncio = $anuncio->idAnuncio;

        //cambio el campo status = 0
        
        $anuncio->status = 1;
        
        if($anuncio->save()){
            echo "Anuncio ". $txtAnuncio ." confirmado.";
        }else{
            echo "Anuncio ". $txtAnuncio ." NO ha sido confirmado.";
        }
    }
    
//    public function publicarAlta(Request $request){
//        //vamos a guardar los datos en las tablas contacto y anuncio
//        //1º comprobamos por el email que exista o no este contacto
//        //si es asi se actualiza los datos, sino se crea uno nuevo
//
//        $existe = Contacto::where("email","=",$request->email)->count();
//        
//        if($existe > 0){
//            //existe, actualizamos los datos
//            $contacto = Contacto::where("email","=",$request->email)->get();
//            
//            $contacto[0]->email = $request->email;
//            $contacto[0]->nombre = $request->nombre;
//            $contacto[0]->telefono = $request->telefono;
//            $contacto[0]->poblacion = $request->poblacion;
//            $contacto[0]->provincia = $request->provincia;
//            $contacto[0]->fechaStatus = date('Y-m-d H:i:s');
//            
//            if(!$contacto[0]->save()){
//                return redirect('publicar/terminado')->with('errors', 'NO se ha publicado el anuncio');
//            }
//            
//            $idContacto = $contacto[0]->idContacto;
//        }else{
//            //no existe, lo damos de alta
//            $contacto = new Contacto();
//            
//            $contacto->email = $request->email;
//            $contacto->nombre = $request->nombre;
//            $contacto->telefono = $request->telefono;
//            $contacto->poblacion = $request->poblacion;
//            $contacto->provincia = $request->provincia;
//            $contacto->fechaStatus = date('Y-m-d H:i:s');
//            $contacto->status = 2;
//            
//            if(!$contacto->save()){
//                return redirect('publicar/terminado')->with('errors', 'NO se ha publicado el anuncio');
//            }
//            
//            $idContacto = $contacto->idContacto;
//        }
//        
//        //2º inserto los datos del anuncio
//        //averiguo el idModelo segun los parametros de marca, año(year), combustible, modelo, carroceria y version
//        
//        $modelo = Modelo::where("marca","=",$request->marca)->where("year","=",$request->year)
//                        ->where("combustible","=",$request->combustible)->where("modelo","=",$request->modelo)
//                        ->where("carroceria","=",$request->carroceria)->where("version","=",$request->version)
//                        ->where("status","=","1")
//                        ->get();
//        
//        $anuncio = new Anuncio();
//        
//        $anuncio->idContacto = $idContacto;
//        $anuncio->idModelo = $modelo[0]->idModelo;
//        $anuncio->kilometros = $request->kilometros;
//        $anuncio->color = $request->color;
//        $anuncio->precio = $request->precio;
//        $anuncio->tipo_cambio = $request->tipo_cambio;
//        $anuncio->observaciones = $request->observaciones;
//        $anuncio->youtube_url = $request->youtube_url;
//        $anuncio->fechaStatus = date('Y-m-d H:i:s');
//        $anuncio->status = 1;
//
//        
//        if($anuncio->save()){
//            return redirect('publicar/terminado')->with('errors', 'Se ha publicado el anuncio');
//        }else{
//            return redirect('publicar/terminado')->with('errors', 'NO se ha publicado el anuncio');
//        }
//    }
    
    
//    public function modelosShow(){
//        $modelos = Modelo::distinct()->select('modelo')->where('marca','=',Input::get('marca'))
//                                                        ->where('year','=',Input::get('year'))
//                                                        ->where('combustible','=',Input::get('combustible'))
//                                                        ->where('status','=','1')->get();
//        
//        //dd($modelos);die;
//        
//        //preparo array para devolver datos
//        $datos = "";
//        foreach ($modelos as $modelo) {
//            $dato['idModelo'] = $modelo->idModelo;
//            $dato['modelo'] = $modelo->modelo;
//            $datos[] = $dato;
//        }
//
//        //devuelvo la respuesta al send
//        echo json_encode($datos);
//    }    
    
//    public function carroceriasShow(){
//        $carrocerias = Modelo::distinct()->select('carroceria')->where('marca','=',Input::get('marca'))
//                                                        ->where('year','=',Input::get('year'))
//                                                        ->where('combustible','=',Input::get('combustible'))
//                                                        ->where('modelo','=',Input::get('modelo'))
//                                                        ->where('status','=','1')->get();
//        
//        //dd($modelos);die;
//        
//        //preparo array para devolver datos
//        $datos = "";
//        foreach ($carrocerias as $carroceria) {
//            $dato['carroceria'] = $carroceria->carroceria;
//            $datos[] = $dato;
//        }
//
//        //devuelvo la respuesta al send
//        echo json_encode($datos);
//    }   
    
//    public function versionesShow(){
//        $versiones = Modelo::distinct()->select('version')->where('marca','=',Input::get('marca'))
//                                                        ->where('year','=',Input::get('year'))
//                                                        ->where('combustible','=',Input::get('combustible'))
//                                                        ->where('modelo','=',Input::get('modelo'))
//                                                        ->where('carroceria','=',Input::get('carroceria'))
//                                                        ->where('status','=','1')->get();
//        
//        //dd($modelos);die;
//        
//        //preparo array para devolver datos
//        $datos = "";
//        foreach ($versiones as $version) {
//            $dato['version'] = $version->version;
//            $datos[] = $dato;
//        }
//
//        //devuelvo la respuesta al send
//        echo json_encode($datos);
//    }   
    
    
    
}
