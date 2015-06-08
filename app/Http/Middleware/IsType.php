<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

abstract class IsType {

    /**
     * @var Guard
     */
    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth; //Nos traemos al usuario que está conectado
    }

    abstract public function getType();

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
        if ( ! $this->auth->user()->is($this->getType()))
        {
            $this->auth->logout(); //Desconectamos al usuario y lo redirigimos

            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->to('auth/login');
            }
        }
		return $next($request);
	}

}
