<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comentario;
use App\User;

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

  public function store(Request $request)
  {
      $this->validate($request,[
        'comentario'=>'required',
      ]);

      $comentario = new Comentario;
      $comentario->user = Auth::user()->id;
      $comentario->bien = $request->id_bien;
      $comentario->comentario = $request->comentario;
      $comentario->habilitado = "true";
      $comentario->save();
      $page = 'bien/';
      $page .= (string) $request->id_bien;
      return redirect($page)->with('message','data has been edited!');
  }

  public function destroy($id)
  {
    $comentario = Comentario::find($id);
    if($comentario->habilitado == "true")
      $comentario->habilitado = "false";
    else
      $comentario->habilitado = "true";
    $comentario->save();

    return redirect('home');
  }
}
