<?php

namespace App\Http\Controllers;

class UsersController extends Controller
{

    public function getIndex()
    {
        $result = \DB::table('users')
            ->select(['users.first_name', 'users.last_name']) //Seleccionamos los campos que queremos que sean devueltos
            ->get();

        dd($result); //Damos formato más amigable al resultado JSON devuelto

        return $result;
    }

}