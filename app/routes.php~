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

/*
Route::get('/', function()
{
        $title = "Hemsidan";
	return View::make('hello')
	->with('title', $title);
});
*/
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
->leftJoin('creditlines as dl', function($join){
                             $join->on('creditlines.from', '=', 'dl.to');
                             $join->on('creditlines.to', '=', 'dl.from');
})
->join('users', 'creditlines.to', '=', 'users.id')
->join('goods', 'creditlines.good_id', '=', 'goods.id')
->where('creditlines.from', Auth::user()->id)
->select(DB::raw('*, COALESCE(dl.balance,0) + creditlines.trust - creditlines.balance as damoney'))
->get();

$creditlines2 = DB::table('creditlines')

->join('creditlines as cl2', function($join){
                             $join->on('creditlines.good_id', '=', 'cl2.good_id');
                             $join->on('creditlines.to', '=', 'cl2.from');
})
->leftJoin('creditlines as dl', function($join){
                             $join->on('creditlines.from', '=', 'dl.to');
                             $join->on('creditlines.to', '=', 'dl.from');
})
->leftJoin('creditlines as dl2', function($join){
                             $join->on('cl2.from', '=', 'dl2.to');
                             $join->on('cl2.to', '=', 'dl2.from');
})
->join('users', 'cl2.to', '=', 'users.id')
->join('goods', 'cl2.good_id', '=', 'goods.id')
->where('creditlines.from', Auth::user()->id)
->where('users.id', "!=", Auth::user()->id)
->select(DB::raw('*, LEAST( COALESCE(dl.balance,0) + creditlines.trust - creditlines.balance, COALESCE(dl2.balance,0) + cl2.trust - cl2.balance) as myleast, cl2.from as viaid, COALESCE(dl.balance,0) + creditlines.trust - creditlines.balance as viaamount'))
->get();


    return View::make('creditlines')->with('creditlines', $creditlines)->with('creditlines2', $creditlines2);
});


Route::get('trust/{id?}/unit/{unit?}/amount/{amount?}', array('before' => 'auth' ,function($id = null, $unit = null, $amount = null)
{
	$trust = array('from' => $id, 'unit' => $unit, 'amount' => $amount);
	$trustunitname = Good::where('id', $trust['unit'])->select('description')->get()->first()->description;
	$trustname = User::where('id', $trust['from'])->select('name')->get()->first()->name;
	return View::make('trust')->with('trust', $trust)->with('trustunitname', $trustunitname)->with('trustname', $trustname);
}));


Route::post('vtrust', array('before' => 'auth' ,function(){
     $userdata = array(
'amount' => Input::get('amount'),
'unit' => Input::get('unit'),
'from' => Input::get('from')
);

if ($userdata['from'] == Auth::user()->id){
return "ej tillåtet";
}


$exists = Creditline::where('from', $userdata['from'])->where('to', Auth::user()->id)->where('good_id', $userdata['unit'])->select('id')->get()->first();

if ($exists)
$updated = Creditline::where('id', $exists['id'])->update(array(
		'from' => $userdata['from'],
		'to' => Auth::user()->id,
		'trust' => $userdata['amount'], 
		'good_id' => $userdata['unit']
));
else
$response = DB::table('creditlines')->insertGetId(
    array(
	'from' => $userdata['from'],
	'to' => Auth::user()->id,
	'trust' => $userdata['amount'], 
	'good_id' => $userdata['unit']
));

// we are now logged in, update database
return Redirect::to('/');
}));



Route::get('user/id/{id?}', function($id = null)
{
	$user = User::where('id', $id)->get()->first();
	$email = false;
	if ($user){
		
		return View::make('user')->with('user', $user)->with('email', $email);
	}
	else
	return "hittade ej";
});


Route::get('user/email/{email?}', function($email = 'null')
{
	$user = User::where('email', $email)->get()->first();
	$email = true;
	if ($user){
		
		return View::make('user')->with('user', $user)->with('email', $email);
	}
	else
	return "hittade ej";
});

