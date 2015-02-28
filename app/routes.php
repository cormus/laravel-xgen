<?php
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






$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setRout('rota-exemplo');
    $page->setTitle('Exemplo de formulário');
        $form = new XForm();
        $form->setTable('cormus_publishing_house');
        $form->setTitle('Exemplo gerador');
        $form->setSubTitle('Formulário de exemplo');
        
        $form->setShowBtnDelete(true);
        $form->setShowBtnEdit(true);
        $form->setShowSelectBox(true);
        $form->setShowBtnNewCadastre(true);
        
        //coloca o compo da imagem
        $field = $form->field('image');
        $field->setName('img_link');
        $field->setTitle('Imagem exemplo');
        $field->setPath('data/img');
        $field->setRequired(false);
        $form->addField($field);
        
        //coloca o campo de texto
        $field = $form->field('text');
        $field->setName('name');
        $field->setRequired(true);
        $field->setTitle('Nome');
        $form->addField($field);

        //coloca o campo de texto
        $field = $form->field('text');
        $field->setName('telefone');
        $field->setRequired(true);
        $field->setTitle('Telefone');
        $form->addField($field);
        

        //coloca o campo de texto
        $field = $form->field('textarea');
        $field->setShowList(false);
        $field->setName('history');
        $field->setTitle('História');
        $form->addField($field);
        
    $page->addModule('center', $form);       
$myApp->addPage($page);


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