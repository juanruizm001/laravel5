<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

    protected  $table = 'user_profiles'; //Parametro opcional, debido a que se están respetando las convenciones, Eloquent buscará la tabla de acuerdo al nombre de la clase, pero si se está trabajando con tablas sin seguir las convenciones, de debe declarar la tabla como en esta línea.

	public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->birthdate)->age;
    }

}
