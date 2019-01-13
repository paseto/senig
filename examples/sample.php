<?php
ini_set('display_errors', 1);
require '../vendor/autoload.php';

$senig = new \App\Senig();

$result = $senig->enviaXMLRet('../43190186933033000100570010001272871190127212-cte.xml', '1', '127287');
if ($result == false) {
    echo $senig->getErrors();
} else {
    if ($result->object->listaMensagem->dStatus !== 100) {
        echo $result->object->listaMensagem->dDetErr;
    }
}