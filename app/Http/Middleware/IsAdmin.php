<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class IsAdmin {

    /**
     * @var Guard
     */
    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth; //Nos traemos al usuario que está conectado
    }

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        //dd($this->auth->user());
        if ($this->auth->user()->type != 'admin') //Si el usuario no es admin, será redigido
        {
            $this->auth->logout(); //Desconectamos al usuario y lo redirigimos

            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest('auth/login');
            }
        }
		return $next($request);
	}

}
