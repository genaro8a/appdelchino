<?php

namespace Remolque\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Redirect;
use Remolque\Categoria;
use Remolque\Http\Controllers\Controller;
use Remolque\Item;
use Session;

class ItemController extends Controller {

	public function __construct() {
		$this->middleware('cors');
		$this->beforeFilter('@find', ['only' => ['edit', 'update', 'destroy']]);
	}
	public function find(Route $route) {
		$this->item = Item::find($route->getParameter('item'));
	}

	public function get_items() {
		$items = Categoria::with('items')->get();
		return response()->json($items, 200, [], JSON_NUMERIC_CHECK);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$items = Item::with('categoria')->get();
		return view('item.index', compact('items'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$categorias = Categoria::lists('nombre_categoria', 'id');
		return view('item.create', compact('categorias'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		Item::create($request->all());
		Session::flash('message', 'Usuario Creado Correctamente');
		return Redirect::to('/item');
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
		$categorias = Categoria::lists('nombre_categoria', 'id');
		return view('item.edit', ['item' => $this->item, 'categorias' => $categorias]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$this->item->fill($request->all());
		$this->item->save();
		Session::flash('message', 'Item Editado Correctamente');
		return Redirect::to('/item');}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
