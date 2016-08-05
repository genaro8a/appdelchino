<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePedidosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('pedidos', function (Blueprint $table) {
				$table->increments('id');
				$table->string('latitud');
				$table->string('longitud');
				$table->integer('cliente_id')->unsigned();
				$table->string('direccion_entrega');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('pedidos');
	}
}
