<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bien;

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
            'lote'=>'required',
            'contruccion'=>'required',
            'precio'=>'required',
            'entidad'=>'required',
            'contacto_email'=>'required',
        ]);
        $bien = new Bien;
        $bien->canton = $request->canton;
        $bien->provincia = $request->provincia;
        $bien->distrito = $request->distrito;
        $bien->localizacion = $request->localizacion;
        $bien->descripcion = $request->descripcion;
        $bien->lote = $request->lote;
        $bien->contruccion = $request->contruccion;
        $bien->precio = $request->precio;
        $bien->entidad = $request->entidad;
        $bien->contacto_email = $request->contacto_email;
        $bien->save();

        return redirect('bien')->with('message','data has been updated!');
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
        if(!$bien){
            abort(404);
        }
        return view('bien.detail')->with('bien',$bien);
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
        $this->validate($request,[
            'canton'=>'required',
            'provincia'=>'required',
            'distrito'=>'required',
            'localizacion'=>'required',
            'descripcion'=>'required',
            'lote'=>'required',
            'contruccion'=>'required',
            'precio'=>'required',
            'entidad'=>'required',
            'contacto_email'=>'required',
        ]);
        $bien = Bien::find($id);
        $bien->canton = $request->canton;
        $bien->provincia = $request->provincia;
        $bien->distrito = $request->distrito;
        $bien->localizacion = $request->localizacion;
        $bien->descripcion = $request->descripcion;
        $bien->lote = $request->lote;
        $bien->contruccion = $request->contruccion;
        $bien->precio = $request->precio;
        $bien->entidad = $request->entidad;
        $bien->contacto_email = $request->contacto_email;
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
        //
    }
}
