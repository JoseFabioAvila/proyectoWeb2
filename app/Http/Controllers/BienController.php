<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Bien;
use App\Comentario;
use App\User;


class BienController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bienes = Bien::all();
        return view('bien.index',['bienes' => $bienes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return redirect('home')->with('message','data has been updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bien = Bien::find($id);
        $comentarios = Comentario::all();
        $users = User::all();
        if(!$bien){
            abort(404);
        }
        return view('bien.detail')
        ->with('bien',$bien)
        ->with('comentarios',$comentarios)
        ->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bien = Bien::find($id);
        if(!$bien){
            abort(404);
        }
        return view('bien.edit')->with('bien',$bien);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bien = Bien::find($id);
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
        $bien->contacto_email = $request->contacto;
        $bien->venta_alquiler = $request->venta_alquiler;
        $bien->save();

        return redirect('bien')->with('message','data has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $bien = Bien::find($id);
      if($bien->habilitado == "habilitado")
        $bien->habilitado = "deshabilitado";
      else
        $bien->habilitado = "habilitado";
      $bien->save();

      return redirect('bien');
    }
}
