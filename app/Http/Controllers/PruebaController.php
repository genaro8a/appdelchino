<?php

namespace Remolque\Http\Controllers;

use Illuminate\Http\Request;
use Remolque\Http\Requests;
use Remolque\Http\Controllers\Controller;

class PruebaController extends Controller
{
	public function index(){
		return "Hola desde Index";
	}

	public function nombre($nombre){
		return "Hola mi nombre es: ".$nombre;
	}
}
