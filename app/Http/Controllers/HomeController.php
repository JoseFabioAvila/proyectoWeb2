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
}
