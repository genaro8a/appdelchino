<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('clientes', function (Blueprint $table) {
				$table->increments('id');
				$table->timestamps();
				$table->string('nombre_cliente');
				$table->string('apellido_cliente');
				$table->string('direccion');
				$table->string('cedula_ruc');
				$table->string('telefono');
				$table->integer('user_id')->unsigned();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('clientes');
	}
}
