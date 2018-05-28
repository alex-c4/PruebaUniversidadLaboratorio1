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
Route::view('/auth.successEdit', 'successEdit');
Route::post('/register', 'Auth\RegisterController@store')->name('register');
// Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/settings', 'Auth\SettingsController@edit')->name('userEdit');
Route::post('/update', 'Auth\SettingsController@update')->name('userUpdate');
Route::get('/resetPassw', 'Auth\ResetPasswordController@index')->name('resetPassw');
Route::post('/updatePassw', 'Auth\ResetPasswordController@update')->name('updatePassw');

Route::get('/forgotPassw', 'Auth\ForgotPasswordController@index')->name('forgotPassw');
Route::post('/forgotPassw', 'Auth\ForgotPasswordController@forgotPassw')->name('forgotPasswEmail');


/*
|--------------------------------------------------------------------------
| Mensaje Routes
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
Route::get('/intercambio_actualizar/{id_intercambio}/{estatus}/{id_sticker}/{id_propietario}', 'IntercambioController@act_intercambio')->name('intercambio.act');


// Route::get('/alert/{data}', function($data){ return view('mensaje.alert', $data); })->name('mensaje.alert');
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
| Stickers Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de panel stickers
|
*/
Route::post('/stickers/contactUser', 'Sticker\StickerController@contactUser')->name('stickersContactUser');

Route::post('/stickers/sentEmailToUser', 'Sticker\StickerController@sentEmailToUser')->name('stickerSentEmailToUser');

Route::post('/stickers/save', 'Sticker\StickerController@save')->name('stickersSave');

Route::get('/stickers/{album_id}', 'Sticker\StickerController@byAlbum')->name('stickersByAlbum');

Route::get('/sticker', 'Sticker\StickerController@index')->name('stickerindex');







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


Route::get('quiniela', 'Quiniela\QuinielaController@index')->name('quiniela');


/*
|--------------------------------------------------------------------------
| Result Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de Resultados
|
*/
Route::get('/result', 'Auth\ResultController@create')->name('create');
//Route::post('/result', 'Auth\ResultController@store');
Route::post('/result', 'Auth\ResultController@store')->name('result');
//Route::post('/register', 'Auth\RegisterController@store')->name('register');