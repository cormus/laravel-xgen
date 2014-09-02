<?php
$link = mysql_pconnect('localhost:8081', 'root', '');
if (!$link) {
    die('Não foi possível conectar: ' . mysql_error());
}
echo 'Conexão bem sucedida';
mysql_close($link);