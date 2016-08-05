<?php

namespace Remolque\Http\Controllers;

use Remolque\Cliente;
use Remolque\Http\Controllers\Controller;

class ServiciosController extends Controller {
	public function listarClientes() {
		$clientes = Cliente::with('user')->get();
		return response()->json($clientes, 200, [], JSON_NUMERIC_CHECK);
	}
	public function obtenerIdCliente($user_id) {
		return response()->json(Cliente::where('user_id', '=', $user_id)->get(), 200, [], JSON_NUMERIC_CHECK);
	}
}
