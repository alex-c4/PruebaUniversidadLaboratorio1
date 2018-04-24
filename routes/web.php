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

// Route::get('/', function () {
//     return view('phpinfo');
// });

<<<<<<< HEAD
=======

//Route::view('/', 'home');
>>>>>>> fc201758cb9d0d74a02e8df042f98f93e9597b88
Route::get('/', 'HomeController@consultar')->name('home.consultar');
Route::view('/welcome', 'welcome');
/*
|--------------------------------------------------------------------------
| Login Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte del Login
|
*/
// Route::view('/register', 'auth.register');
Route::get('/register', 'Auth\RegisterController@create')->name('create');
Route::view('/auth.success', 'success');
Route::post('/register', 'Auth\RegisterController@store')->name('register');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::post('/login', 'Auth\LoginController@login')->name('login');

/*
|--------------------------------------------------------------------------
| notice Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de noticias
|
*/
Route::get('/notice/{id}', 'NoticeController@consultar')->name('notice.consulta');

/*
|--------------------------------------------------------------------------
| Stikers Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de intercabio de barajitas
|
*/
Route::get('/mensajeria/', 'ChatController@consultar')->name('mensajeria.consulta');
Route::get('/msj', function(){
	//return'has sido redirecionado a la ruta notice-mostrar'. $arreglo;
	//return view('notice',compact('arreglo'));
		return view('mesage');

})->name('mensajeria.mostrar');


//=======
Route::get('/verify/{code}', 'VerifyController@verify')->name('verify');
Route::get('/verify', 'VerifyController@verifyEmpty')->name('verifyEmpty');
<<<<<<< HEAD


/*
|--------------------------------------------------------------------------
| notice Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de noticias
|
*/
Route::get('/notice/{id}', 'NoticeController@consultar')->name('notice.consulta');


/*
|--------------------------------------------------------------------------
| Contact Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de noticias
|
*/
Route::POST("/registerContact", "ContactController@store");
=======
//>>>>>>> c937b8297721056b07b5ff684017f57acd468c21
>>>>>>> fc201758cb9d0d74a02e8df042f98f93e9597b88
