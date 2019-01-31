<?php
ini_set('display_errors', 1);
require '../vendor/autoload.php';

$senig = new \Paseto\Senig();
$doc = '00000000000000';
$result = $senig->enviaXMLRet('43171100000000000000570010001007561171170010-cte.xml', $doc, '127287');
if ($result == false) {
    echo $senig->getErrors();
} else {
    $response = $senig->getResponse();
    echo '<pre>';
    print_r($response);

    if ($response->object->listaMensagem->dStatus != 100) {
        echo $response->object->listaMensagem->dDetErr;
    }else{
        echo $response->object->dtRec;
        echo $response->object->cProtocolo;
        echo $response->object->listaMensagem->cStatus;
    }
}