<?php

namespace Remolque;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {
	protected $fillable = ['latitud', 'longitud', 'direccion_entrega', 'cliente_id'];
	public function cliente() {
		return $this->belongsTo('Remolque\Cliente');
	}
	public function item() {
		return $this->belongsToMany('Remolque\Item', 'item_pedidos');
	}
}