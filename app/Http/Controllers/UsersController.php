<?php

namespace App\Http\Controllers;

class UsersController extends Controller {

    public function getIndex()
    {
        $result = \DB::table('users')->get();


        return $result;
    }

}