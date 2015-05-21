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

Route::post('/ajax/cep', function()
{
	$cep = Input::get('cep');
	$ch  = curl_init();
	$timeout = 5; // set to zero for no timeout
	curl_setopt ($ch, CURLOPT_URL, 'http://cep.correiocontrol.com.br/'.$cep.'.json');
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	// display file
	echo $file_contents;
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
    $page->setIco('fa-cog');
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
    $page->setIco('fa-cog');
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
       
		//coloca o campo de texto
        $field = $form->field('Imagebox');
        $field->setName('name1');
        $field->setRequired(true);
		$field->setShowList(true);
		$field->setShowForm(true);
        $field->setTitle('Imagebox');
        $form->addField($field);

		//coloca o campo de texto
        $field = $form->field('editor');
        $field->setName('name2');
        $field->setRequired(true);
		$field->setFilter(true);
		$field->setShowList(false);
		$field->setShowForm(true);
        $field->setTitle('Editor');
        $form->addField($field);

		//coloca o campo de texto
        $field = $form->field('text');
        $field->setName('text');
        $field->setRequired(true);
		$field->setFilter(true);
		$field->setShowList(true);
		$field->setShowForm(true);
        $field->setTitle('Text');
        $form->addField($field);

		//---dados de CEP --//

		//coloca o campo de texto
        $field = $form->field('cep');
        $field->setName('cep');
		$field->references('bairro', 'logradouro', 'uf', 'localidade', 'cep');
        $field->setRequired(true);
		$field->setFilter(true);
		$field->setShowList(true);
		$field->setShowForm(true);
        $field->setTitle('CEP');
        $form->addField($field);

		//coloca o campo de texto
        $field = $form->field('text');
        $field->setName('bairro');
        $field->setRequired(true);
		$field->setFilter(true);
		$field->setShowList(false);
		$field->setShowForm(true);
        $field->setTitle('Text');
        $form->addField($field);

		//coloca o campo de texto
        $field = $form->field('text');
        $field->setName('logradouro');
        $field->setRequired(true);
		$field->setFilter(true);
		$field->setShowList(false);
		$field->setShowForm(true);
        $field->setTitle('Text');
        $form->addField($field);

		//coloca o campo de texto
        $field = $form->field('text');
        $field->setName('uf');
        $field->setRequired(true);
		$field->setFilter(true);
		$field->setShowList(false);
		$field->setShowForm(true);
        $field->setTitle('Text');
        $form->addField($field);

		//coloca o campo de texto
        $field = $form->field('text');
        $field->setName('localidade');
        $field->setRequired(true);
		$field->setFilter(true);
		$field->setShowList(false);
		$field->setShowForm(true);
        $field->setTitle('Text');
        $form->addField($field);


		//coloca o campo de texto
		$field = $form->field('select');
		$field->setName('id_select');
		$field->setRequired(true);
		$field->setFilter(true);
		$field->setShowList(true);
		$field->setShowForm(true);
		$field->setTitle('Teste seleção');
		$field->setOptions(array(
			'Opção 1',
			'Opção 2'
		));
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