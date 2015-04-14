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
	$page->setLayout('adm.layouts.login');
    $authController = new AuthController();
    $page->addModule('center', $authController);
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
    $page->setLoginRequired(false);
    $page->setShowInMenuIfLogged(false);
    $page->setRout('minha-pagina');
    $page->setTitle('Minha Página');
	$page->setCreateControl(true);
	$page->setCreateModel(true);
	$page->setCreateView(true);
		//ao executar a primeira vez o controle, o model e a view ainda não foram criados. Na segunda execução pode remover os comentários
		//$minhaPaginaController = new MinhaPaginaController();
    //$page->addModule('center', $minhaPaginaController);       
$myApp->addPage($page);




$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setRout('rota-exemplo');
    $page->setTitle('Exemplo de formulário');
	$page->setCreateControl(false);
	$page->setCreateModel(false);
	$page->setCreateView(false);
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
        $field->setName('name2');
        $field->setRequired(true);
        $field->setTitle('Nome2');
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
$MenuController   = new  MenuController();
$myApp->addDefullModules('adm.layouts.default', array(
    'header'   => $headerController->render(),
    'menu'     => $MenuController->render(array('projectName'   => $myApp->getTitle(), 'pages' => $myApp->getPages())),
    'menuLeft' => $MenuController->menuLeft(array('projectName' => $myApp->getTitle(), 'pages' => $myApp->getPages()))
));

$myApp->addDefullModules('adm.layouts.login', array(
    'header'   => $headerController->render(),
    'menu'     => $MenuController->render(array('projectName'   => $myApp->getTitle(), 'pages' => $myApp->getPages())),
    'menuLeft' => $MenuController->menuLeft(array('projectName' => $myApp->getTitle(), 'pages' => $myApp->getPages()))
));

//executa o aplicativo
$myApp->run();