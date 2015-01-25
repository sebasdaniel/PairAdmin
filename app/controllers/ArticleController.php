<?php

/**
* Controlador para los articulos
*/
class ArticleController extends BaseController{

	public function obtenerArticulos(){

		$articulos = Article::all()->toArray();

		return View::make('article.home', array('articulos' => $articulos));
	}

	public function formNuevo(){

		return View::make('article.add');
	}

	public function guardarArticulo(){

		$data = Input::all();

		$reglas = array('titulo' => 'required');

		$validador = Validator::make($data, $reglas);

		if($validador->passes()){

			$article = new Article;

			$article->titulo = $data['titulo'];

			$article->save();

			return Redirect::to('/article');
		}

		return $validador->messages();
	}

	public function formEditar($id){

		$article = Article::find($id);

		return View::make('article.edit', array('articulo' => $article));
	}

	public function editarArticulo($id){

		$data = Input::all();

		$reglas = array('titulo' => 'required');

		$validador = Validator::make($data, $reglas);

		if($validador->passes()){

			$article = Article::find($id);

			$article->titulo = $data['titulo'];

			$article->save();

			return Redirect::to('/article');
		}

		return $validador->messages();
	}

	public function buscarArticulo(){

		$titulo = Input::get('titulo');

		// Obtenemos los articulos cuyo titulo contengan el parametro de busqueda
		$articulos = Article::where('titulo', 'LIKE', '%'.$titulo.'%')->get();

		return View::make('article.home', array('articulos' => $articulos));
	}
}