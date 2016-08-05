<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemPedidosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('item_pedidos', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('item_id')->unsigned();
				$table->integer('pedido_id')->unsigned();
				$table->integer('cantidad');
				$table->float('costo_total');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('item_pedidos');
	}
}
