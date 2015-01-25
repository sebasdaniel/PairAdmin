<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() // home
{
	//return View::make('pruebas.hello');
	return View::make('home');
});

Route::get('/pares', function(){ // lista de todos los pares
	//return 'Pagina de pares';
	$pares = Pair::all()->toArray();

	// foreach ($pares as $value) {
	// 	echo $value->nombres;
	// }
	//var_dump($pares);
	return View::make('pares', array('pares' => $pares));
});

Route::get('/pares/{id}/editar', function($id){ // editar los datos de un par especifico

	$par = Pair::find($id);

	$data['par'] = $par;

	return View::make('editar', $data);
});

Route::post('/pares/{id}/editar', function($id){ // guardar los datos editados de un par especifico

	$data = Input::all();

	$par = Pair::find($id);

	$reglas = array(
		'nombre' => 'required|alpha_spaces',
		'apellido' => 'required|alpha_spaces',
		'telefono' => 'numeric',
		'correo' => 'required|email|unique:pairs',
		'profesion' => 'alpha_spaces',
		'formacion' => 'alpha_spaces',
		'area_formacion' => 'alpha_spaces',
		'area_especifica' => 'required',
		'otras_areas' => 'alpha',
		'fun_enti' => 'required',
		'fecha1' => 'required|numeric|min:2000|max:3000',
		'fecha2' => 'required|numeric|min:2000|max:3000'
	);

	$validador = Validator::make($data, $reglas);

	if($validador->passes()){

		// $par = Pair::find($id);
		
		$par->nombres = $data['nombre'];
		$par->apellidos = $data['apellido'];

		if($data['telefono']){
			$par->telefono = $data['telefono'];
		}
		
		$par->correo = $data['correo'];
		
		if($data['profesion']){
			$par->profesion = $data['profesion'];
		}
		
		if($data['formacion']){
			$par->formacion = $data['formacion'];
		}
		
		if($data['area_formacion']){
			$par->area_formacion = $data['area_formacion'];
		}
		
		if($data['area_especifica']){
			$par->area_especifica = $data['area_especifica'];
		}
		
		if($data['otras_areas']){
			$par->otras_areas = $data['otras_areas'];
		}
		
		$par->f_e = $data['fun_enti'];

		$par->fecha_pub1 = $data['fecha1'];
		
		$par->fecha_pub2 = $data['fecha2'];
		
		$par->save();

		return Redirect::to('pares'); // pasarle mensaje de que se guardaron correctamente
	}

	$data2['par'] = $par;

	// return View::make('editar', $data2)->withErrors($validador);
	// return URL::previous()->withErrors($validador);

	return $validador->messages();
});

Route::get('/pares/{id}/correo', 'PairController@contactarPar');

Route::get('/nuevo', function(){ // pagina para agregar un nuevo par

	return View::make('agregar');
});

Route::post('/nuevo', function(){ // guardar nuevo par

	$data = Input::all();

	$reglas = array(
		'nombre' => 'required|alpha_spaces',
		'apellido' => 'required|alpha_spaces',
		'telefono' => 'numeric',
		'correo' => 'required|email|unique:pairs',
		'profesion' => 'alpha_spaces',
		'formacion' => 'alpha_spaces',
		'area_formacion' => 'alpha_spaces',
		'area_especifica' => 'required',
		'otras_areas' => 'alpha',
		'fun_enti' => 'required',
		'fecha1' => 'required|numeric|min:2000|max:3000',
		'fecha2' => 'required|numeric|min:2000|max:3000'
	);

	$validador = Validator::make($data, $reglas);

	if($validador->passes()){

		$par = new Pair;
		
		$par->nombres = $data['nombre'];
		$par->apellidos = $data['apellido'];

		if($data['telefono']){
			$par->telefono = $data['telefono'];
		}
		
		$par->correo = $data['correo'];
		
		if($data['profesion']){
			$par->profesion = $data['profesion'];
		}
		
		if($data['formacion']){
			$par->formacion = $data['formacion'];
		}
		
		if($data['area_formacion']){
			$par->area_formacion = $data['area_formacion'];
		}
		
		if($data['area_especifica']){
			$par->area_especifica = $data['area_especifica'];
		}
		
		if($data['otras_areas']){
			$par->otras_areas = $data['otras_areas'];
		}
		
		$par->f_e = $data['fun_enti'];

		$par->fecha_pub1 = $data['fecha1'];
		
		$par->fecha_pub2 = $data['fecha2'];
		
		$par->save();

		return View::make('agregar'); // pasarle mensaje de que se guardaron correctamente
	}

	//return $validador->messages();
	return View::make('agregar')->withErrors($validador); // envia los errores a la vista
});

Route::get('/correo', function(){
	return View::make('contactar');
});


// ---------------- Ejemplos -------------
//
// Route::get('/libros/{genero}', function($genero){
// 	//return "libros en la categoria {$genero}.";
// 	$data['genero'] = $genero;
// 	return View::make('pruebas.simple', $data);
// });

// Route::get('/primera', function(){
// 	return Redirect::to('segunda');
// });

// Route::get('/segunda', function(){
// 	//return URL::previous();
// 	return URL::to('nuevo');
// });

// Route::get('/recursos', function(){
// 	return URL::asset('robots.txt');
// });
