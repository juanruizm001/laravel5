<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
//use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\EditUserRequest;

class UsersController extends Controller {

    public function __construct()
    {
        $this->beforeFilter('@findUser', ['only' => ['show', 'edit', 'update', 'destroy']]);
    }

    public function findUser(Route $route)
    {
        $this->user = User::findOrFail($route->getParameter('users'));

    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        //dd($request->get('name'));
        $request->get('name');
		$users = User::name($request->get('name'))->orderBy('id', 'DESC')->paginate();

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
	public function store(CreateUserRequest $request)
	{
        $user = User::create($request::all());
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
        return view('admin.users.edit')->with('user', $this->user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUserRequest $request, $id)
	{
        $this->user->fill($request->all());
        $this->user->save();

        return redirect()->back(); //Ser devueltos a la pagina anterior, en este caso, la de edicion del usuario
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
        //return $id;
        //User::destroy($id);
        $this->user->delete();

        $message = $this->user->full_name . ' fué eliminado.';
        
        if ($request->ajax()) {
            return response()->json([
                'ig' => $this->user->id,
                'message' => $message
            ]);
        }

        Session::flash('message', $message);

        return redirect()->route('admin.users.index');

	}

}
