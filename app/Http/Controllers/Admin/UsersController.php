<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::paginate();

        //dd($users);
        return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        //dd($request->all()); Para mostrar lo enviado por el formulario
        /*
        $user = new User($request->all());
        $user->save();
        return $redirect->route('admin.users.index');
        */
        $data = Request::all();
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'type' => 'required'
        );

        $v = Validator::make($data, $rules);

        if ($v ->fails()) //Verifica si la validacion falla
        {
            //dd($v->errors()); //Lo podemos usar para visualizar los errores retornando un array
            return redirect()->back() //Redireccionamos de vuelta al usuario
                ->withErrors($v->errors()) //Enviamos la lista de errores al usuario
                ->withInput(Request::except('password')); //Devolvemos los registros al formulario, excepto el password
        }

        $user = User::create(Request::all());
        return redirect()->route('admin.users.index');
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
        $user = User::findOrFail($id); //Metodo para cargar un solo usuario, y si no existe retorna un error 404
		return view('admin.users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $user = User::findOrFail($id); //Metodo para cargar un solo usuario, y si no existe retorna un error 404
        $user->fill(Request::all());
        $user->save();

        return redirect()->back(); //Ser devueltos a la pagina anterior, en este caso, la de edicion del usuario
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

}
