<?php
/**
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
//Route::get('/login',  'AuthController@loginForm');
//Route::post('/login', 'AuthController@login');
//Route::get('/logout', 'AuthController@logout');
//Route::get('/auth/passwordReset/{token}',  'AuthController@passwordReset');
//Route::post('/auth/recoverPassword',       'AuthController@recoverPassword');
//Route::post('/auth/passwordReset/{token}', 'AuthController@passwordReset');


//ajax do sistema para quando existem relação entro os campos select
Route::post('/ajax/relationship', function()
{
    $id      = Input::get('id');
    $id_camp = Input::get('id_camp');
    $table   = Input::get('table');
    $camp    = Input::get('camp');
    return DB::table($table)->where($id_camp, '=', $id)->select('id', $camp)->get();
});


$myApp = new XApp();
$myApp->setTitle('My app');

$page  = new XPage();
    $page->setShowInMenu(false);
    $page->setRout('/login/{action?}');
    $page->setTitle('login');
    $homeController = new AuthController();
    $page->addModule('center', $homeController);
$myApp->addPage($page);


$page  = new XPage();
    $page->setRout('/');
    $page->setTitle('Home');
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setShowInMenu(false);
    $homeController = new HomeController();
    $page->addModule('center', $homeController->render());
$myApp->addPage($page);


$page  = new XPage();
    $page->setRout('404');
    $page->setTitle('404');
    //$page->setLoginRequired(true);
    //$page->setShowInMenuIfLogged(true);
    $page->setShowInMenu(false);
    $homeController = new HomeController();
    $page->addModule('center', $homeController->render());
$myApp->addPage($page);


$myApp->setMenuStructure(array(
    '/',
    array
    (
        'title'  => 'Games',
        'routes' => array
        (
            'games-producer',
            'games',
            'games_my',
        ),
    ),
    array
    (
        'title'  => 'Consoles',
        'routes' => array
        (
            'consoles-producer',
            'consoles',
        )
    )
));

//coloca os módulos padrão a todas as páginas
$headerController = new  HeaderController();
$FooterController = new  FooterController();
$MenuController   = new  MenuController();
$myApp->addDefullModules(array(
    'header' => $headerController->render(),
    'footer' => $FooterController->render(),
    'menu'   => $MenuController->render(array('projectName' => $myApp->getTitle(), 'pages' => $myApp->getPages()))
));


//executa o aplicativo
$myApp->run();