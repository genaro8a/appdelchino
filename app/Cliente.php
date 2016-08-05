<?php

namespace Remolque;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {
	protected $fillable = ['nombre_cliente', 'apellido_cliente', 'cedula_ruc', 'direccion', 'telefono', 'user_id'];

	public function user() {
		return $this->belongsTo('Remolque\User');
	}
	public function factura() {
		return $this->hasMany('Remolque\Factura');
	}
	public function pedido() {
		return $this->hasMany('Remolque\Pedido');
	}
}