<?php

namespace App\Http\Controllers;

class UsersController extends Controller
{

    public function getIndex()
    {
        $result = \DB::table('users')
            //->select(['users.first_name', 'users.last_name']) //Seleccionamos los campos que queremos que sean devueltos
            //->where('first_name', 'Juan') //Condicion de busqueda sea Juan
            //->where('first_name', '<>', 'Juan') //Condicion de busqueda distintos de Juan
            ->where('first_name', 'like', '%an%') //Condicion de busqueda busqueda con comodin
            ->orderBy('first_name', 'ASC') //Aplicando orden al resultado
            ->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
            ->get();

        dd($result); //Damos formato más amigable al resultado JSON devuelto

        return $result;
    }

}