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
// Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

/*
|--------------------------------------------------------------------------
| Stikers Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de mensajeria para el intercabio de barajitas
|
*/
Route::get('/msj/{id_user}/{intercambio}', 'MensajeriaController@create')->name('mensajeria.create');
Route::post('/msj','MensajeriaController@store')->name('mensajeria.register');
Route::get('/conv','MensajeriaController@conversaciones')->name('conversaciones.lista');
Route::get('/men/{id_intercambio}','MensajeriaController@conversacion')->name('conversacion.mostrar');

/*
|--------------------------------------------------------------------------
| notice Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de noticias
|

*/
Route::get('/notice/{id}', 'NoticeController@consultar')->name('notice.consulta');

Route::get('/verify/{code}', 'VerifyController@verify')->name('verify');
Route::get('/verify', 'VerifyController@verifyEmpty')->name('verifyEmpty');

/*
|--------------------------------------------------------------------------
| Login Routes
|--------------------------------------------------------------------------
*/
Route::get('/sticker', 'Sticker\StickerController@index')->name('stickerindex');





/*
|--------------------------------------------------------------------------
| Contact Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de Contact
|
*/
Route::POST("/registerContact", "ContactController@store");


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas al dashboard
|
*/
Route::get('/dashboard', 'dashboard\DashboardController@index')->name('dasboardindex');

