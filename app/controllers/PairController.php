<?php

/**
* Controlador para los pares
*/
class PairController extends BaseController{

	// Lista de todos los pares
	public function obtenerPares(){

		$pares = Pair::all()->toArray();

		$paresRevisados = array();

		foreach ($pares as $par) {

			/* si la ultima publicacion del par es anterior a dos años, el par no esta activo,
			   de lo contrario si lo esta.
			*/
			if($par['ultima_publicacion'] < (idate('Y') - 1)){
				$par['activo'] = false;
			} else {
				$par['activo'] = true;
			}
			
			$paresRevisados[] = $par;
		}

		return View::make('pair.home', array('pares' => $paresRevisados));
	}

	// Editar los datos de un par especifico
	public function verPar($id){

		$par = Pair::find($id);

		if(count($par)){

			$data['par'] = $par;
			$data['articulos'] = $par->articles;

			return View::make('pair.view', $data);
			// return $par->articles;
		}
		
		return 'El par no existe';
	}

	// Formulario para agregar nuevo par
	public function formNuevo(){
		return View::make('pair.add');
	}

	// Guardar los datos editados de un par especifico
	public function editarPar($id){

		$data = Input::all();

		$par = Pair::find($id);

		$reglas = array(
			'nombre' => 'required|alpha_spaces',
			'apellido' => 'required|alpha_spaces',
			'correo' => 'required|email',
			'formacion' => 'required|alpha_spaces',
			'area_formacion' => 'alpha_spaces',
			'area_especifica' => 'alpha_spaces',
			'otras_areas' => 'alpha_spaces',
			'entidad' => 'required',
			'ultima_publicacion' => 'required|numeric|min:2000|max:3000'
		);

		$validador = Validator::make($data, $reglas);

		if($validador->passes()){

			// $par = Pair::find($id);
			
			$par->nombres = ucwords(strtolower($data['nombre']));

			$par->apellidos = ucwords(strtolower($data['apellido']));

			$par->correo = $data['correo'];

			$par->formacion = $data['formacion'];
			
			if($data['area_formacion']){
				$par->area_formacion = $data['area_formacion'];
			}
			
			if($data['area_especifica']){
				$par->area_especifica = $data['area_especifica'];
			}
			
			if($data['otras_areas']){
				$par->otras_areas = $data['otras_areas'];
			}
			
			$par->entidad = $data['entidad'];

			$par->ultima_publicacion = $data['ultima_publicacion'];
			
			$par->save();

			return Redirect::to('pair/'.$id); // pasarle mensaje de que se guardaron correctamente
		}

		$data2['par'] = $par;

		// return View::make('editar', $data2)->withErrors($validador);
		// return URL::previous()->withErrors($validador);

		return $validador->messages();
	}

	// Formulario para el enviar correo a un par especifico
	public function contactarPar($id){
		return View::make('contact'); // hay que obtener los datos del para para pasarselo como parametros
	}

	// Guardar nuevo par
	public function guardarPar(){

		$data = Input::all();

		$reglas = array(
			'nombre' => 'required|alpha_spaces',
			'apellido' => 'required|alpha_spaces',
			'correo' => 'required|email',
			'formacion' => 'required|alpha_spaces',
			'area_formacion' => 'alpha_spaces',
			'area_especifica' => 'alpha_spaces',
			'otras_areas' => 'alpha_spaces',
			'entidad' => 'required',
			'ultima_publicacion' => 'required|numeric|min:2000|max:3000'
		);

		$validador = Validator::make($data, $reglas);

		if($validador->passes()){

			$par = new Pair;
			
			$par->nombres = ucwords(strtolower($data['nombre']));

			$par->apellidos = ucwords(strtolower($data['apellido']));

			$par->correo = $data['correo'];

			$par->formacion = $data['formacion'];
			
			if($data['area_formacion']){
				$par->area_formacion = $data['area_formacion'];
			}
			
			if($data['area_especifica']){
				$par->area_especifica = $data['area_especifica'];
			}
			
			if($data['otras_areas']){
				$par->otras_areas = $data['otras_areas'];
			}
			
			$par->entidad = $data['entidad'];

			$par->ultima_publicacion = $data['ultima_publicacion'];
			
			$par->save();

			return Redirect::to('/pair'); // pasarle mensaje de que se guardaron correctamente
		}

		return $validador->messages();
		// return Redirect::to('/pair')->withErrors($validador); // envia los errores a la vista
	}

	// Formulario para relacionar articulo con par que lo evaluo
	public function formAddArticle($id){

		$par = Pair::find($id);

		if(count($par)){

			$articulos = Article::all()->toArray();

			$data = array(
				'idPar' => $par['id'], 
				'nombrePar' => $par['nombres'].' '.$par['apellidos'], 
				'articulos' => $articulos
			);

			return View::make('pair.add-article', $data);
		}

		// return View::make('pair.add-article');
		return 'El par no se encontro';
	}

	// Relacionar articulo con un par que lo evaluo
	public function addArticle($id){

		$pair = Pair::find($id);

		if(count($pair)){

			$data = Input::all();

			$reglas = array(
				'articulo' => 'required|numeric',
				'evaluation-date' => 'required|date'
			);

			$validador = Validator::make($data, $reglas);

			if($validador->passes()){

				$pair->articles()->attach($data['articulo'], array('fecha_evaluacion' => $data['evaluation-date']));

				return Redirect::to('/pair/'.$id);
			}

			return $validador->messages();
		}
		
		return 'El par no se encuentra registrado';
	}

	// Eliminar relacion de articulo con par
	public function delArticle($id, $idArt){

		$par = Pair::find($id);
		$articulo = Article::find($idArt);

		if(count($par) && count($articulo)){

			$par->articles()->detach($articulo);

			return Redirect::to('/pair/'.$id);
		}

		return 'Par o articulo no existen!!';
	}

	public  function buscarPar(){

		$data = Input::all();

		$consulta = $data['query'];
		$filtro = $data['estado'];

		// Obtenemos los pares cuya area especifica contenga el parametro de busqueda
		$pares = Pair::where('area_especifica', 'LIKE', '%'.$consulta.'%')->get();

		$paresRevisados = array();

		foreach ($pares as $par) {

			/* si la ultima publicacion del par es anterior a dos años, el par no esta activo,
			   de lo contrario si lo esta.
			*/
			if($par['ultima_publicacion'] < (idate('Y') - 1)){
				$par['activo'] = false;
			} else {
				$par['activo'] = true;
			}

			if($filtro == 'todos'){

				// todos los pares
				$paresRevisados[] = $par;

			}elseif($filtro == 'aptos' && $par['activo']){

				// pares aptos
				$paresRevisados[] = $par;

			} elseif(!$par['activo']) { // filtro = no-aptos

				// pares no aptos
				$paresRevisados[] = $par;
			}

		}

		return View::make('pair.home', array('pares' => $paresRevisados));
	}
}