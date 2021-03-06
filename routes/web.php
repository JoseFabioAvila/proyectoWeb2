<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::any ( 'sendemail', function () {
    if (Request::get ( 'message' ) != null){
        $data = array (
            'bodyMessage' => Request::get ( 'message' )
        );
    }
    else{
        $data [] = '';
    }
    Mail::send ( 'email', $data, function ($message) {
        $message->from ( 'avilaestradajosefabio@gmail.com', 'Bienes Progra Web 2' );
        $message->to ( Request::get ( 'toEmail' ) )->subject ( 'Informacion de la propiedad' );
    });

    return Redirect::back ()->withErrors ( [ 'Your email has been sent successfully' ] );

} );




Route::group(['middleware' => ['web']], function(){
    Route::post('/bien/comment', 'BienController@comment');
    Route::resource('/home', 'HomeController');
    Route::resource('/contact', 'ContactController');
    Route::resource('/bien', 'BienController');
    Route::resource('/comentario', 'ComentarioController');
    Route::resource('/user','UserController');

    Route::get('/redirect', 'SocialiteAuthController@redirect');
    Route::get('/callback', 'SocialiteAuthController@callback');
});
