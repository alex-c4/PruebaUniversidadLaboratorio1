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
// Route::get('/verify2', function () {
//     return view('/auth.verify');
// });
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
Route::get('/msj/{intercambio}', 'MensajeriaController@create')->name('mensajeria.create');
Route::post('/msj','MensajeriaController@store')->name('mensajeria.register');
Route::get('/conv','MensajeriaController@conversaciones')->name('conversaciones.lista');
Route::get('/men/{id_intercambio}','MensajeriaController@conversacion')->name('conversacion.mostrar');

Route::get('/intercambio/{id_solicitante}/{id_stiker}', 'IntercambioController@store')->name('intercambio.store');

/*
|--------------------------------------------------------------------------
| notice Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de noticias
|
*/

Route::post('/stickers/contactUser', 'Sticker\StickerController@contactUser')->name('stickersContactUser');

Route::post('/stickers/sentEmailToUser', 'Sticker\StickerController@sentEmailToUser')->name('stickerSentEmailToUser');

Route::post('/stickers/save', 'Sticker\StickerController@save')->name('stickersSave');

Route::get('/stickers/{album_id}', 'Sticker\StickerController@byAlbum')->name('stickersByAlbum');

Route::get('/sticker', 'Sticker\StickerController@index')->name('stickerindex');




Route::get('/msj', function(){
	//return'has sido redirecionado a la ruta notice-mostrar'. $arreglo;
	//return view('notice',compact('arreglo'));
		return view('mesage');

})->name('mensajeria.mostrar');


Route::get('/notice/{id}', 'NoticeController@consultar')->name('notice.consulta');

Route::get('/verify/{code}', 'VerifyController@verify')->name('verify');
Route::get('/verify', 'VerifyController@verifyEmpty')->name('verifyEmpty');
// Route::get('/verifyOk', 'VerifyController@verifyEmpty')->name('verifyEmpty');
Route::get('verifyOk', function($data){
	return view('auth.verify', $data);
})->name('verifyOk');





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
Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dasboardindex');


