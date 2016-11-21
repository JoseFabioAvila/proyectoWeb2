<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentario;

class ComentarioController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $id)
  {
      $this->validate($request,[
          'canton'=>'required',
          'provincia'=>'required',
          'distrito'=>'required',

          'localizacion'=>'required',
          'descripcion'=>'required',
          'tamano'=>'required',

          'cuartos'=>'required',
          'banos'=>'required',
          'precio'=>'required',

          'entidad'=>'required',
          'contacto_email'=>'required',
          'venta_alquiler' =>'required',
      ]);
      $bien = new Bien;
      $bien->canton = $request->canton;
      $bien->provincia = $request->provincia;
      $bien->distrito = $request->distrito;
      $bien->localizacion = $request->localizacion;
      $bien->descripcion = $request->descripcion;
      $bien->tamano = $request->tamano;
      $bien->cuartos = $request->cuartos;
      $bien->banos = $request->banos;
      $bien->precio = $request->precio;
      $bien->entidad = $request->entidad;
      $bien->contacto_email = $request->contacto_email;
      $bien->venta_alquiler = $request->venta_alquiler;
      $bien->habilitado = "habilitado";
      $bien->save();

      return redirect('#')->with('message','data has been updated!');
  }
}
