<?php
if (!isset($_GET['p'])) {
	echo '';
	exit;
}

//tipo de ajuste
$cortConf = null;
if(isset($_GET['f']))
{
    
    switch($_GET['f'])
    {
        case 1:
            $cortConf = 'inside';
        break;
        case 2:
            $cortConf = 'outside';
        break;
        case 3:
            $cortConf = 'fill';
        break;
    }
}

//Chama o arquivo com a classe WideImage
require(__DIR__.'/../app/libraries/cormus/wideimage/WideImage.php');
// Carrega a imagem a ser manipulada
$image = WideImage::load($_GET['p']);

//se não foi setado a altura calcula proporcionalmente
if(!isset($_GET['h']))
{
    $_GET['h'] = intval(($_GET['w'] * $image->getHeight()) / $image->getWidth());
}

// Redimensiona a imagem
$image = $image->resize($_GET['w'], $_GET['h'], $cortConf);

//crop realiza corte na imagem
if(isset($_GET['cropw']) && isset($_GET['croph']))
{
    $image = $image->crop(0, 0, $_GET['cropw'], $_GET['croph']);
}

//escreve a imagem no navegador
$image->output('jpg');

// Salva a imagem em um arquivo (novo ou não)
//$image->saveToFile('nova_foto.jpg');