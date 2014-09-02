<?php

$myApp = new XApp();
$myApp->setTitle('Title APP');

$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setRout('usuarios');
    $page->setTitle('Cadastro de usuários');
        $form = new XForm();
        $form->setTable('usuarios');
        $form->setTitle('Cadastro Usuário');
            
            $field = $form->field('text');
            $field->setName('name');
            $field->setTitle('Nome');
            $form->addField($field);

    $page->addModule('center', $form); 
$myApp->addPage($page);

$headerController = new  HeaderController();
$FooterController = new  FooterController();
$MenuController   = new  MenuController();
$myApp->addDefullModules(array(
    'header' => $headerController->render(),
    'footer' => $FooterController->render(),
    'menu'   => $MenuController->render
	(
		array(
				'projectName' => $myApp->getTitle(), 
				'pages' => $myApp->getPages()
			)
	)
));

$myApp->run();




