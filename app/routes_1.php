<?php
/*
 * - clicar em produto, listar usuários que tem o mesmo
 * - clicar em produto mostrar média de valor
 * - estimativa de raridade
 * - vender/aceitar ofertas/ou não
 * - reputação de compra
 * - reputação de melhor coleção
 * 
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
| 
| http://laravel.com/docs/routing
|
*/

// Todas as outras rotas:
Route::get('/login', 'AuthController@loginForm');
Route::get('/logout', 'AuthController@logout');
Route::post('/login', 'AuthController@login');
Route::post('/auth/recoverPassword', 'AuthController@recoverPassword');
Route::get('/auth/passwordReset/{token}', 'AuthController@passwordReset');
Route::post('/auth/passwordReset/{token}', 'AuthController@passwordReset');


//página inicial do site caso esteja logado
Route::get('/', array('before' => 'auth', function(){
	
    $url = URL::to('system');
    header("Location: {$url}");
    exit();
}));


//pagina inicial do site
Route::get('/',  function(){
	
    $headerController = new  HeaderController();
    $FooterController = new  FooterController();
    $MenuController   = new  MenuController();
	
    $HomeController   = new  HomeController();
	
	 //coloca os módulos na estrutura do site
    $models = array
    (
        'header' => $headerController->header(),
        'footer' => $FooterController->footer(),
        'menu'   => $MenuController->menu(),
        'center' => $HomeController->home()
    );
	
    return View::make('layouts.default', $models);
});

//pagina de games
Route::get('/game',  function(){
	
    $headerController = new  HeaderController();
    $FooterController = new  FooterController();
    $MenuController   = new  MenuController();
	
    $GamesController   = new  GamesController();
	
	 //coloca os módulos na estrutura do site
    $models = array
    (
        'header' => $headerController->header(),
        'footer' => $FooterController->footer(),
        'menu'   => $MenuController->menu(),
        'center' => $GamesController->listing()
    );
	
	return View::make('layouts.default', $models);
});

Route::get('/game/form',  function(){
	
    $headerController = new  HeaderController();
    $FooterController = new  FooterController();
    $MenuController   = new  MenuController();
	
    $GamesController   = new  GamesController();
	
	 //coloca os módulos na estrutura do site
    $models = array
    (
        'header' => $headerController->header(),
        'footer' => $FooterController->footer(),
        'menu'   => $MenuController->menu(),
        'center' => $GamesController->form()
    );
	
	return View::make('layouts.default', $models);
});

/*========================================*/

//pagina de games
Route::get('/console',  function(){
	
    $headerController = new  HeaderController();
    $FooterController = new  FooterController();
    $MenuController   = new  MenuController();
	
    $ConsolesController = new  ConsolesController();
	
	 //coloca os módulos na estrutura do site
    $models = array
    (
        'header' => $headerController->header(),
        'footer' => $FooterController->footer(),
        'menu'   => $MenuController->menu(),
        'center' => $ConsolesController->listing()
    );
	
	return View::make('layouts.default', $models);
});

Route::get('/console/form',  function(){
	
    $headerController = new  HeaderController();
    $FooterController = new  FooterController();
    $MenuController   = new  MenuController();
	
    $ConsolesController = new  ConsolesController();
	
	 //coloca os módulos na estrutura do site
    $models = array
    (
        'header' => $headerController->header(),
        'footer' => $FooterController->footer(),
        'menu'   => $MenuController->menu(),
        'center' => $ConsolesController->form()
    );
	
	return View::make('layouts.default', $models);
});


/*========================================*/

//pagina de produtora de games
Route::get('/game-producer',  function(){
	
    $headerController = new  HeaderController();
    $FooterController = new  FooterController();
    $MenuController   = new  MenuController();
	
    $GamesProducerController = new  GamesProducerController();
	
	 //coloca os módulos na estrutura do site
    $models = array
    (
        'header' => $headerController->header(),
        'footer' => $FooterController->footer(),
        'menu'   => $MenuController->menu(),
        'center' => $GamesProducerController->listing()
    );
	
    return View::make('layouts.default', $models);
});

Route::any('/game-producer/form',  function(){
    $headerController = new  HeaderController();
    $FooterController = new  FooterController();
    $MenuController   = new  MenuController();
	
    $GamesProducerController = new  GamesProducerController();
	
	 //coloca os módulos na estrutura do site
    $models = array
    (
        'header' => $headerController->header(),
        'footer' => $FooterController->footer(),
        'menu'   => $MenuController->menu(),
        'center' => $GamesProducerController->form()
    );
	
	return View::make('layouts.default', $models);
});


/*========================================*/

//pagina de fabricantes de consoles
Route::get('/console-makers',  function(){
	
    $headerController = new  HeaderController();
    $FooterController = new  FooterController();
    $MenuController   = new  MenuController();
	
    $GameProducerController = new  GamesProducerController();
	
	 //coloca os módulos na estrutura do site
    $models = array
    (
        'header' => $headerController->header(),
        'footer' => $FooterController->footer(),
        'menu'   => $MenuController->menu(),
        'center' => $GameProducerController->listing()
    );
	
	return View::make('layouts.default', $models);
});

Route::get('/console-makers/form',  function(){
    $headerController = new  HeaderController();
    $FooterController = new  FooterController();
    $MenuController   = new  MenuController();
	
    $GameProducerController = new  GamesProducerController();
	
	 //coloca os módulos na estrutura do site
    $models = array
    (
        'header' => $headerController->header(),
        'footer' => $FooterController->footer(),
        'menu'   => $MenuController->menu(),
        'center' => $GameProducerController->form()
    );
	
	return View::make('layouts.default', $models);
});

/*========================================*/


Route::get('/configuration',  function(){
    $headerController = new  HeaderController();
    $FooterController = new  FooterController();
    $MenuController   = new  MenuController();
	
    $ConfigurationController = new  ConfigurationController();
	
	 //coloca os módulos na estrutura do site
    $models = array
    (
        'header' => $headerController->header(),
        'footer' => $FooterController->footer(),
        'menu'   => $MenuController->menu(),
        'center' => $ConfigurationController->profile()
    );
	
	return View::make('layouts.default', $models);
});







//página inicial do site caso não esteja logado
Route::get('/image', function(){
    return View::make('image.image', array());
});