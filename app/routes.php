<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
        $title = "Hemsidan";
	return View::make('hello')
	->with('title', $title);
});

Route::get('/', array('before' => 'auth' ,function()
{
    $title = "Hemsidan - inloggad";
	return View::make('hello')
	->with('title', $title);
}));

Route::get('login', function()
{
    return View::make('login');
});

Route::post('login', function(){
     $userdata = array(
'username' => Input::get('uname'),
'password' => Input::get('password')
);
if ( Auth::attempt($userdata) )
{
// we are now logged in, go to home
return Redirect::to('/');
}
else
{
// auth failure! lets go back to the login
return Redirect::to('login')
->with('login_errors', true);
// pass any error notification you want
// i like to do it this way :)
}
});


Route::get('logout', function() {
Auth::logout();
return Redirect::to('/');
});

Route::get('creditlines', function()
{
    $creditlines = DB::table('creditlines')
->join('users', 'creditlines.to', '=', 'users.id')
->join('goods', 'creditlines.good_id', '=', 'goods.id')
->where('from', Auth::user()->id)->get();

$creditlines2 = DB::table('creditlines')
->join('creditlines as cl2', function($join){
                             $join->on('creditlines.good_id', '=', 'cl2.good_id');
                             $join->on('creditlines.to', '=', 'cl2.from');
})
->join('users', 'cl2.to', '=', 'users.id')
->join('goods', 'cl2.good_id', '=', 'goods.id')
->where('creditlines.from', Auth::user()->id)
->select(DB::raw('*, LEAST( creditlines.amount, cl2.amount) as myleast, cl2.from as viaid, creditlines.amount as viaamount'))
->get();


    return View::make('creditlines')->with('creditlines', $creditlines)->with('creditlines2', $creditlines2);
});
