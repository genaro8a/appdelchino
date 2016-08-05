<?php

namespace Remolque\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Redirect;
use Remolque\Categoria;
use Remolque\Http\Controllers\Controller;

use Session;

class CategoriaController extends Controller {
	public function __construct() {
		$this->middleware('auth');
		$this->middleware('admin');
		$this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
	}
	public function find(Route $route) {
		$this->categoria = Categoria::find($route->getParameter('categoria'));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$categorias = Categoria::paginate(100);
		return view('categoria.index', compact('categorias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('categoria.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		Categoria::create($request->all());
		Session::flash('message', 'Categoria Creada Correctamente');
		return Redirect::to('/categoria');
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
		return view('categoria.edit', ['categoria' => $this->categoria]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->categoria->fill($request->all());
		$this->categoria->save();
		Session::flash('message', 'Categoria Actulizada Correctamente');
		return Redirect::to('/categoria');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$this->categoria->delete();
		Session::flash('message', 'Categoria Eliminada Correctamente');
		return Redirect::to('/categoria');
	}
}
