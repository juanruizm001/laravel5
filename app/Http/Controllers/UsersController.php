<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{

    //Realizando consultas mediante Eloquent
    public function getOrm()
    {
        $user = User::first(); //Extraemos el primer registro de la BD

        dd($user->profile->age);
        //dd($result->getFullNameAttribute());
    }


    //Realizando consultas mediante Fluent
    public function getIndex()
    {
        $result = \DB::table('users')
            //->select([ 'users.first_name', 'users.last_name']) //Seleccionamos los campos que queremos que sean devueltos
            //->where('first_name', 'Juan') //Condicion de busqueda sea Juan
            //->where('first_name', '<>', 'Juan') //Condicion de busqueda distintos de Juan
            //->where('first_name', 'like', '%an%') //Condicion de busqueda busqueda con comodin
            //->orderBy('first_name', 'ASC') //Aplicando orden al resultado
            //->join('user_profiles', 'users.id', '=', 'user_profiles.user_id') //Union de tablas
            ->LeftJoin('user_profiles', 'users.id', '=', 'user_profiles.user_id') //Union de tablas
            ->get();

        foreach ($result as $row)
        {
            $row->full_name = $row->first_name . ' ' . $row->last_name; //Creamos el nombre completo a partir del resultado de los campos individuales de la consulta
            $row->age = \Carbon\Carbon::parse($row->birthdate)->age; //Calculamos la edad actual segun la fecha retornada de la consulta
        }

        dd($result); //Damos formato más amigable al resultado JSON devuelto

        return $result;
    }

}