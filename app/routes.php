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

Route::get('/', 'HomeController@showHome'); // Home

Route::get('/pair', 'PairController@obtenerPares'); // Lista de todos los pares

Route::get('/pair/add', 'PairController@formNuevo'); // Formulario para agregar nuevo par

Route::post('/pair/add', 'PairController@guardarPar'); // Guardar nuevo par

Route::post('/pair/search', 'PairController@buscarPar');

Route::get('/pair/{id}', 'PairController@verPar'); // Muestra los datos de un par especifico

Route::post('/pair/{id}/edit', 'PairController@editarPar'); // Guardar los datos editados de un par especifico

Route::get('/pair/{id}/contact', 'PairController@contactarPar'); // Formulario para enviar correo a un par especifico

Route::get('/pair/{id}/article/add', 'PairController@formAddArticle'); // Formulario para relacionar un articulo con un par

Route::post('/pair/{id}/article/add', 'PairController@addArticle'); // Relaciona articulo con par

Route::get('/pair/{id}/article/del/{idArt}', 'PairController@delArticle'); // Elimina la relacion de una articulo con un par


Route::get('/article', 'ArticleController@obtenerArticulos'); // Lista de todos los articulos

Route::get('/article/add', 'ArticleController@formNuevo'); // Formulario para agregar un nuevo articulo

Route::post('article/add', 'ArticleController@guardarArticulo'); // Guarda nuevo articulo

Route::post('article/search', 'ArticleController@buscarArticulo');

Route::get('article/{id}/edit', 'ArticleController@formEditar'); // Formulario para editar un articulo

Route::post('article/{id}/edit', 'ArticleController@editarArticulo'); // Guarda datos editados de un articulo

Route::get('/contact', 'HomeController@showContact'); // Formulario para enviar correos



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
