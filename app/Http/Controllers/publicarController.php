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
        //listado de las provincias
        $provincias = Provincia::all();

        return view('publicar')->with('modelos',$modelos)->with('provincias',$provincias); 
    }
    
    public function publicarAlta(Request $request){
        //vamos a guardar los datos en las tablas contacto y anuncio
        //1º comprobamos por el email que exista o no este contacto
        //si es asi se actualiza los datos, sino se crea uno nuevo

        $existe = Contacto::where("email","=",$request->email)->count();
        
        if($existe > 0){
            //existe, actualizamos los datos
            $contacto = Contacto::where("email","=",$request->email)->get();
            
            $contacto[0]->email = $request->email;
            $contacto[0]->nombre = $request->nombre;
            $contacto[0]->telefono = $request->telefono;
            $contacto[0]->poblacion = $request->poblacion;
            $contacto[0]->provincia = $request->provincia;
            $contacto[0]->fechaStatus = date('Y-m-d H:i:s');
            
            if(!$contacto[0]->save()){
                return redirect('publicar/terminado')->with('errors', 'NO se ha publicado el anuncio');
            }
            
            $idContacto = $contacto[0]->idContacto;
        }else{
            //no existe, lo damos de alta
            $contacto = new Contacto();
            
            $contacto->email = $request->email;
            $contacto->nombre = $request->nombre;
            $contacto->telefono = $request->telefono;
            $contacto->poblacion = $request->poblacion;
            $contacto->provincia = $request->provincia;
            $contacto->fechaStatus = date('Y-m-d H:i:s');
            $contacto->status = 1;
            
            if(!$contacto->save()){
                return redirect('publicar/terminado')->with('errors', 'NO se ha publicado el anuncio');
            }
            
            $idContacto = $contacto->idContacto;
        }
        
        //2º inserto los datos del anuncio
        //averiguo el idModelo segun los parametros de marca, año(year), combustible, modelo, carroceria y version
        
        $modelo = Modelo::where("marca","=",$request->marca)->where("year","=",$request->year)
                        ->where("combustible","=",$request->combustible)->where("modelo","=",$request->modelo)
                        ->where("carroceria","=",$request->carroceria)->where("version","=",$request->version)
                        ->where("status","=","1")
                        ->get();
        
        $anuncio = new Anuncio();
        
        $anuncio->idContacto = $idContacto;
        $anuncio->idModelo = $modelo[0]->idModelo;
        $anuncio->kilometros = $request->kilometros;
        $anuncio->color = $request->color;
        $anuncio->precio = $request->precio;
        $anuncio->tipo_cambio = $request->tipo_cambio;
        $anuncio->observaciones = $request->observaciones;
        $anuncio->youtube_url = $request->youtube_url;
        $anuncio->fechaStatus = date('Y-m-d H:i:s');
        $anuncio->status = 1;

        
        if($anuncio->save()){
            return redirect('publicar/terminado')->with('errors', 'Se ha publicado el anuncio');
        }else{
            return redirect('publicar/terminado')->with('errors', 'NO se ha publicado el anuncio');
        }
    }
    
    
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
    
    
    
}
