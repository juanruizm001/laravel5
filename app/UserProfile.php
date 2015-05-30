<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->birthdate)->age;
    }

}
