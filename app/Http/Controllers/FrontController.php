<?php

namespace Remolque\Http\Controllers;

use Illuminate\Http\Request;
use Remolque\Http\Requests;
use Remolque\Http\Controllers\Controller;

class FrontController extends Controller
{
  public function __construct(){
    $this->middleware('auth',['only' => 'admin']);
  }

   public function index(){
        return view('index');
   }

   public function contacto(){
        return view('contacto');
   }

   public function reviews(){
        return view('reviews');
   }

   public function admin(){
        return view('admin.index');
   }
}
