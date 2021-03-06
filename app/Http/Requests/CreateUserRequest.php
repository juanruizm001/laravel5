<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        //return false;
        return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email', //Agregamos validacion para que no se dupliquen correos y no se caiga la aplicacion
            'password' => 'required',
            'type' => 'required|in:user,admin' //se agrega validacion in, estableciendo los valores que deben ser aceptados
		];
	}

}
