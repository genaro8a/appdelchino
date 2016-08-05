<?php

namespace Remolque\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use Remolque\Cliente;
use Remolque\Http\Controllers\Controller;
use Remolque\User;

class ClienteController extends Controller {
	public function __construct() {
		$this->middleware('cors');
		$this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
	}
	public function find(Route $route) {
		$this->cliente = Cliente::find($route->getParameter('cliente'));
	}
	/*
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$clientes = Cliente::with('user');
		return view('cliente.index', compact('clientes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$usuarios = User::lists('id', 'email');
		return view('cliente.create', compact('usuarios'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		if ($request->ajax()) {
			$user           = new User();
			$user->name     = $request->nombre_cliente;
			$user->email    = $request->correo;
			$user->password = $request->password;
			$user->save();
			$cliente                   = new Cliente();
			$cliente->nombre_cliente   = $request->nombre_cliente;
			$cliente->apellido_cliente = $request->apellido_cliente;
			$cliente->cedula_ruc       = $request->cedula_ruc;
			$cliente->direccion        = $request->direccion;
			$cliente->telefono         = $request->telefono;
			$cliente->user_id          = $user->id;
			$cliente->save();
			return response()->json([
					"mensaje" => $user->id
				]);
		} else {
			return response()->json($request);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$cliente = Cliente::find($id);
		return response()->json(
			$cliente->toArray()
		);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->cliente->fill($request->all());
		$this->cliente->save();
		return response()->json(["mensaje" => "Datos correctamente actualizados"]);
	}
	public function ActualizarMedico(Request $request) {
		$cliente                   = Cliente::find($request->id);
		$cliente->nombre_cliente   = $request->nombre_cliente;
		$cliente->apellido_cliente = $request->apellido_cliente;
		$cliente->cedula_ruc       = $request->cedula_ruc;
		$cliente->direccion        = $request->direccion;
		$cliente->telefono         = $request->telefono;
		$cliente->save();
		return response()->json(["mensaje" => "Datos correctamente actualizados"]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$this->cliente->delete();
		$user = User::find($this->cliente->user_id);
		$user->delete();
		return response()->json(["mensaje" => "Cliente correctamente actualizado"]);//
	}
	public function eliminarCliente(Request $request) {
		$cliente = Cliente::find($request->id);
		$cliente->delete();
		return response()->json(["mensaje" => "elimiado exitosamente"]);
	}
}
