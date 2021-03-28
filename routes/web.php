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
Route::get('/test/{nombre}', ['as' => 'test', function($nombre){
    return 'testing... '.$nombre;
}]);
Route::view('/welcome', 'welcome');
Route::view('/loginExt', 'loginExt');

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

//Modificado por yanis para registro basico de usuario
Route::post('/register', 'Auth\RegisterController@store_basic')->name('register');
//Route::post('/register_full', 'Auth\RegisterController@store_full')->name('register_full');
//Route::post('/register', 'Auth\RegisterController@store')->name('register');

// Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('/loginForm', 'Auth\LoginController@loginForm')->name('loginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('login', ['as' => 'login.index', 'uses' => 'Auth\LoginController@index']);

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/settings', 'Auth\SettingsController@edit')->name('userEdit');
Route::post('/update', 'Auth\SettingsController@update')->name('userUpdate');
Route::get('/resetPassw', 'Auth\ResetPasswordController@index')->name('resetPassw');
Route::post('/updatePassw', 'Auth\ResetPasswordController@update')->name('updatePassw');

Route::get('/forgotPassw', 'Auth\ForgotPasswordController@index')->name('forgotPassw');
Route::post('/forgotPassw', 'Auth\ForgotPasswordController@forgotPassw')->name('forgotPasswEmail');
Route::get('encryptkey/{key}', ['as' => 'auth.encryptkey', 'uses' => 'Auth\ForgotPasswordController@encryptkey']);


// Route::post('loginForm', ['as' => 'login.form', 'uses' => 'Auth\LoginController@login']);

// Route::post('/loginForm', ['as' => 'login.loginForm', 'uses' => 'Auth\LoginController@loginForm'])->name('loginForm');

//Registro con social login facebook
Route::get('/registerFB', 'Auth\RegisterController@store_fb')->name('create');
// Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('loginExternal', ['as' => 'auth.loginExternal' , 'uses' => 'Auth\LoginController@loginExternal']);


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
Route::post('contact', ['as' => 'contact.store', 'uses' => 'ContactController@store']);


/*
|--------------------------------------------------------------------------
| Quiniela
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a las Quinielas
|
*/
Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dasboardindex');


Route::get('quiniela', 'Quiniela\QuinielaController@index')->name('quiniela');
Route::post('quiniela/save', 'Quiniela\QuinielaController@savePronostic')->name('savePronostic');
Route::get('quiniela/searchGames/{quiniela_id}', 'Quiniela\QuinielaController@searchGames')->name('searchGames');
// Route::get('quiniela/searchGames/{quiniela_id}/{phase}', 'Quiniela\QuinielaController@searchGamesyPhase')->name('searchGamesPhase');
Route::get('quiniela/addPronosticsNewPhase', 'Quiniela\QuinielaController@addPronosticsNewPhase')->name('addPronosticsNewPhase');
Route::view('quiniela/listPronosticsNewPhase', 'listPronosticsNewPhase');
Route::get('quiniela/showNewPronosticByPhase/{id_quiniela}/{bet_id}/{phase}', 'Quiniela\QuinielaController@showNewPronosticByPhase')->name('showNewPronosticByPhase');
Route::view('quiniela/addGameByPhase', 'addGameByPhase')->name('addGameByPhase');
Route::post('quiniela/savePronosticByPhase', 'Quiniela\QuinielaController@savePronosticByPhase')->name('savePronosticByPhase');
// Route::view('addGames', 'addGames');
Route::view('quiniela.saveSuccessfull', 'saveSuccessfull');
Route::get('quiniela.searchPronostics', 'Quiniela\QuinielaController@searchPronostics')->name('searchPronostics');
Route::view('quiniela/pronostics', 'pronostics');
Route::get('quiniela.pronosticEdit/{betId}', 'Quiniela\QuinielaController@pronosticEdit')->name('pronosticEdit');
Route::get('quiniela.pronosticGet/{betId}/{quiniela_id}', 'Quiniela\QuinielaController@pronosticGet')->name('pronosticGet');
// Route::get('quiniela.pronosticShow/{betId}', 'Quiniela\QuinielaController@pronosticShow')->name('pronosticShowById');
Route::post('quiniela.updatePronostic', 'Quiniela\QuinielaController@updatePronostic')->name('updatePronostic');
Route::get('quiniela/create', 'Quiniela\QuinielaController@createPrivateQuiniela')->name('createPrivateQuiniela');

Route::get('quinielas/{user_id}', 'Quiniela\QuinielaController@listarQuinielas')->name('quinielas.list');
Route::post('puntuaciones', 'Quiniela\QuinielaController@quinielaPuntaciones')->name('quiniela.puntuaciones');
Route::get('pronosticos.mostrar/{pronostic_id}', 'Quiniela\QuinielaController@quinielaPuntacionesPor_id')->name('quiniela.puntuacionesDos');
Route::view('quiniela/createQuiniela', 'createQuiniela');
Route::post('saveNewQuiniela', 'Quiniela\QuinielaController@saveNewQuiniela')->name('saveNewQuiniela');
Route::get('codeQuiniela', 'Quiniela\QuinielaController@codeQuiniela')->name('codeQuiniela');
Route::view('quiniela/codeQuiniela', 'codeQuiniela');
Route::post('quiniela/addCodeQuiniela', ['as' => 'quiniela.addCode', 'uses' => 'Quiniela\QuinielaController@addCodeQuiniela']);
Route::post('quiniela/pronosticCompare', ['as' => 'quiniela.pronosticCompare', 'uses' => 'Quiniela\QuinielaController@comparePronostic']);
Route::post('quiniela/sendInvitations', ['as' => 'quiniela.sendInvitations', 'uses' => 'Quiniela\QuinielaController@sendInvitations']);

/*
|--------------------------------------------------------------------------
| Pronostic Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de Pronosticos
|
*/
Route::get("pronostic.pdfdownload/{id_quiniela}", ["as" => "pronostic.pdfdownload", "uses" => "PronosticController@pdfdownload"]);


/*
|--------------------------------------------------------------------------
| Result Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de Resultados
|
*/
// Route::get('/result/{id_champ}', 'Result\ResultController@create')->name('create');
Route::post('result/index', ['as' => 'result.index', 'uses' => 'Result\ResultController@index']);
Route::get('result/listChampionships/', ['as' => 'result.listChampionships', 'uses' => 'Result\ResultController@listChampionships']);

//Route::post('/result', 'Auth\ResultController@store');
Route::post('/result', 'Result\ResultController@store')->name('result');
//Route::post('/register', 'Auth\RegisterController@store')->name('register');

Route::get('result/positionsTable', ['as' => 'result.positionsTable', 'uses' => 'Result\ResultController@positionsTable']);
Route::get('result/showPronosticDetails/{betId}', ['as' => 'result.showPronosticDetails', 'uses' => 'Result\ResultController@showPronosticDetails']);
Route::get('result/pronosticUser/{betId}/{quiniela_id}', ['as' => 'result.pronosticUser', 'uses' => 'Result\ResultController@pronosticUser']);



/*
|--------------------------------------------------------------------------
| Payment Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de pagos
|
*/
//Route::view('/payment.formpayment', 'formpayment');
//Route::get('/payment', 'Payment\PaymentController@create')->name('payment');
/*
Route::get('/formpayment', function () {
    return view('/payment.formpayment');
});*/
//Route::get('/notice/{id}', 'NoticeController@consultar')->name('notice.consulta');
//Vista estandar para mensajes de cualquier tipo
Route::view('warning', 'warning');

//Route::get('/payment{id_bet}', 'Payment\PaymentController@create')->name('payment');
Route::get('payment/{id_bet}', ['as' => 'payment.create', 'uses' => 'Payment\PaymentController@create']);

Route::get('validarPagoBets/{betId}/{validacion}', 'Payment\PaymentController@validarPagoBets')->name('validarPagoBets');

Route::get('rechargeBalance', ['as' => 'rechargeBalance', 'uses' => 'Payment\PaymentController@rechargeBalance']);

Route::get('payment', ['as' => 'payment.store', 'uses' => 'Payment\PaymentController@store']);

Route::get('listarBetsPay', 'Payment\PaymentController@listarBetsPay')->name('listarBetsPay');

Route::post('registerTransaction', ['as' => 'registerTransaction', 'uses' => 'Payment\PaymentController@registerTransaction']);
Route::get('rechargeBalanceManually', ['as' => 'rechargeBalanceManually', 'uses' => 'Payment\PaymentController@rechargeBalanceManually']);
Route::post('storeRechargeBalanceManually', ['as' => 'storeRechargeBalanceManually', 'uses' => 'Payment\PaymentController@storeRechargeBalanceManually']);
Route::get('paymentsList', ['as' => 'paymentsList', 'uses' => 'Payment\PaymentController@paymentsList']);
Route::get('paymentsToApprove', ['as' => 'paymentsToApprove', 'uses' => 'Payment\PaymentController@paymentsToApprove']);
Route::post('searchPaymentInfo', ['as' => 'searchPaymentInfo', 'uses' => 'Payment\PaymentController@searchPaymentInfo']);
Route::put('updatePaymentStatus', ['as' => 'updatePaymentStatus', 'uses' => 'Payment\PaymentController@updatePaymentStatus']);

/*
|--------------------------------------------------------------------------
| Noticias Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de Noticias (reportage)
|
*/
// Route::get('/news/{id}', 'NoticeController@consultar')->name('notice.consulta');


Route::get('news', ['as' => 'news.index', 'uses' => 'NewsController@index']);
Route::get('news/create', ['as' => 'news.create', 'uses' => 'NewsController@create']);
Route::post('news', ['as' => 'news.store', 'uses' => 'NewsController@store']);
Route::get('news/{id}', ['as' => 'news.show', 'uses' => 'NewsController@show']);
Route::get('news/{id}/edit', ['as' => 'news.edit', 'uses' => 'NewsController@edit']);
Route::put('news/{id}', ['as' => 'news.update', 'uses' => 'NewsController@update']);
Route::patch('news/{id}', ['as' => 'news.restore', 'uses' => 'NewsController@restore']);
Route::delete('news/{id}', ['as' => 'news.destroy', 'uses' => 'NewsController@destroy']);

/*
|--------------------------------------------------------------------------
| Blogs Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de Blogs
|
*/
Route::get('blog', ['as' => 'blogs.index', 'uses' => 'BlogController@index']);
Route::get('blogs/create', ['as' => 'blogs.create', 'uses' => 'BlogController@create']);
Route::post('blogs/store', ['as' => 'blogs.store', 'uses' => 'BlogController@store']);
Route::get('blogs/{id}', ['as' => 'blogs.show', 'uses' => 'BlogController@show']);
Route::get('blogs/{id}/edit', ['as' => 'blogs.edit', 'uses' => 'BlogController@edit']);
Route::put('blogs/{id}', ['as' => 'blogs.update', 'uses' => 'BlogController@update']);
Route::patch('blogs/{id}', ['as' => 'blogs.restore', 'uses' => 'BlogController@restore']);
Route::delete('blogs/{id}', ['as' => 'blogs.destroy', 'uses' => 'BlogController@destroy']);

Route::post('blogsComment/store', ['as' => 'blogsComment.store', 'uses' => 'BlogController@storeComent']);

/*
|--------------------------------------------------------------------------
| Games Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de Blogs
|
*/
Route::get('games', ['as' => 'games.index', 'uses' => 'GameController@index']);
Route::get('games/create', ['as' => 'games.create', 'uses' => 'GameController@create']);
Route::post('games/store', ['as' => 'games.store', 'uses' => 'GameController@store']);
Route::post('games/getGamesAjax', ['as' => 'game.getGamesAjax', 'uses' => 'GameController@getGamesAjax']);
Route::post("game/deleteGame", ["as" => "deleteGameAjax", "uses" => "GameController@deleteGameAjax"]);
/*
|--------------------------------------------------------------------------
| Championship Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de Campeonatos
|
*/
Route::get('championship', ['as' => 'championship.index', 'uses' => 'ChampionshipController@index']);
Route::get('championship/create', ['as' => 'championship.create', 'uses' => 'ChampionshipController@create']);
Route::post('championship/store', ['as' => 'championship.store', 'uses' => 'ChampionshipController@store']);
Route::patch('championship/{id}', ['as' => 'championship.restore', 'uses' => 'ChampionshipController@restore']);
Route::delete('championship/{id}', ['as' => 'championship.destroy', 'uses' => 'ChampionshipController@destroy']);
Route::get('championship/{id}/edit', ['as' => 'championship.edit', 'uses' => 'ChampionshipController@edit']);
Route::put('championship/{id}', ['as' => 'championship.update', 'uses' => 'ChampionshipController@update']);

/*
|--------------------------------------------------------------------------
| Clubes Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de Clubes
|
*/
Route::get('club', ['as' => 'club.index', 'uses' => 'ClubController@index']);
Route::get('club/create', ['as' => 'club.create', 'uses' => 'ClubController@create']);
Route::get('club/{id}/edit', ['as' => 'club.edit', 'uses' => 'ClubController@edit']);
Route::post('club', ['as' => 'club.store', 'uses' => 'ClubController@store']);
Route::put('club/{id}', ['as' => 'club.update', 'uses' => 'ClubController@update']);
Route::post('clubAjax', ['as' => 'club.storeAjax', 'uses' => 'ClubController@storeAjax']);


/*
|--------------------------------------------------------------------------
| Stadium Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de Estadios
|
*/
Route::post('stadium', ['as' => 'stadium.storeAjax', 'uses' => 'StadiumController@storeAjax']);

/*
|--------------------------------------------------------------------------
| Plans Routes
|--------------------------------------------------------------------------
|
| Seccion para las rutas asociadas a la parte de Los Planes
|
*/
Route::get('purchaseXportGamePlan/{idPlan}', ['as' => 'plan.purchaseXportGamePlanView', 'uses' => 'PlanController@purchaseXportgamePlanView']);
Route::post('purchaseXportGamePlan', ['as' => 'plan.purchaseXportGamePlanStore', 'uses' => 'PlanController@purchaseXportGamePlanStore']);

