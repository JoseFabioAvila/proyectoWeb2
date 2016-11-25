<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'administrador'=>'required',
            'habilitado'=>'required',
        ]);
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->administrador = $request->administrador;
        $user->habilitado = $request->habilitado;
        $user->save();

        return redirect('user')->with('message','data has been updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user){
            abort(404);
        }
        return view('user.detail')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if(!$user){
            abort(404);
        }
        return view('user.edit')->with('user',$user);
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
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',
            'administrador'=>'required',
            'habilitado'=>'required',
        ]);
        $user = User::find($id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->administrador = $request->administrador;
        $user->habilitado = $request->habilitado;
        $user->save();

        return redirect('user')->with('message','data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      /*$this->validate($request,[
            'habilitado'=>'required',
        ]);
        $user = User::find($id);
        $user->habilitado = $request->habilitado;
        $user->save();
        return redirect('user')->with('message','data has been updated!');*/
    }
}
