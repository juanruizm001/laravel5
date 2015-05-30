<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function(Blueprint $table)
		{
			$table->increments('id');

            $table->mediumText('bio')->nullable();
            $table->string('twitter')->nullable();
            $table->string('website')->nullable();

            $table->integer('user_id')->unsigned();

            //Crea la relacion entre la tabla users y users_profile mediante el campo user_id
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); //Hace que si se elimina el usuario, tambien se elimina su perfil correspondiente

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_profiles');
	}

}
