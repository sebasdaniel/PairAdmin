<?php

/**
* Controlador para las funciones de correo
*/
class MailController extends BaseController{

	public function showForm(){
		return View::make('contact');
	}

	public function sendMail(){

		$data = Input::all();

		$reglas = array(
			'email' => 'required|email',
			'asunto' => 'required',
			'message' => 'required'
		);

		$validador = Validator::make($data, $reglas);

		if($validador->passes()){

			$enviado = mail($data['email'], $data['asunto'], $data['message']);

			if($enviado){
				return 'Correo enviado';
			} else {
				'Error al enviar correo';
			}
		}
	}
}