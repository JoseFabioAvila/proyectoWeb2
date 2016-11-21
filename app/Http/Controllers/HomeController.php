<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bien;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bienes = Bien::all();
        return view('home.index', ['bienes'=>$bienes]);
    }

    public function store(Request $request)
    {
        $bienes = Bien::all();
        $resultado = $bienes;
        if($request->provincia != "")
          $resultado = $this->filtroProvincia($resultado,$request->provincia);
        if($request->canton != "")
          $resultado = $this->filtroCanton($resultado,$request->canton);
        if($request->distrito != "")
          $resultado = $this->filtroDistrito($resultado,$request->distrito);
        if($request->cantidad_banos != "")
          $resultado = $this->filtroBanos($resultado,$request->cantidad_banos);
        if($request->cantidad_cuartos != "")
          $resultado = $this->filtroCuartos($resultado,$request->cantidad_cuartos);
        if($request->precio_minimo != "")
          $resultado = $this->filtroPrecioMin($resultado,$request->precio_minimo);
        if($request->precio_maximo != "")
          $resultado = $this->filtroPrecioMax($resultado,$request->precio_maximo);

        return view('home.index', ['bienes'=>$resultado]);
    }

    public static function filtroProvincia($lista,$filtro)
    {
        $resultado = [];
        foreach ($lista as $bien) {
          if($bien->provincia == $filtro){
            array_push($resultado,$bien);
          }
        }
        return $resultado;
    }
    public static function filtroCanton($lista,$filtro)
    {
        $resultado = [];
        foreach ($lista as $bien) {
          if($bien->canton == $filtro){
            array_push($resultado,$bien);
          }
        }
        return $resultado;
    }
    public static function filtroDistrito($lista,$filtro)
    {
        $resultado = [];
        foreach ($lista as $bien) {
          if($bien->distrito == $filtro){
            array_push($resultado,$bien);
          }
        }
        return $resultado;
    }
    public static function filtroBanos($lista,$filtro)
    {
        $resultado = [];
        foreach ($lista as $bien) {
          if($bien->banos == $filtro){
            array_push($resultado,$bien);
          }
        }
        return $resultado;
    }
    public static function filtroCuartos($lista,$filtro)
    {
        $resultado = [];
        foreach ($lista as $bien) {
          if($bien->cuartos == $filtro){
            array_push($resultado,$bien);
          }
        }
        return $resultado;
    }
    public static function filtroPrecioMin($lista,$filtro)
    {
        $resultado = [];
        foreach ($lista as $bien) {
          if(intval($bien->precio_minimo) >= intval($filtro)){
            array_push($resultado,$bien);
          }
        }
        return $resultado;
    }
    public static function filtroPrecioMax($lista,$filtro)
    {
        $resultado = [];
        foreach ($lista as $bien) {
          if(intval($bien->precio_maximo) <= intval($filtro)){
            array_push($resultado,$bien);
          }
        }
        return $resultado;
    }
}
