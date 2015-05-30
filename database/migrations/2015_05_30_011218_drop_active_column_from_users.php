<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\Schema;

class DropActiveColumnFromUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        //Con esto eliminaremos la columna active de la tabla users
		Schema::table('users', function( Blueprint $table)
        {
            $table->dropColumn('active');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        //Con esto agregamos la columna active de la tabla users
        Schema::table('users', function( Blueprint $table)
        {
            $table->boolean('active')->default(true);
        });
	}

}
