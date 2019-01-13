<?php
ini_set('display_errors', 1);
require '../vendor/autoload.php';

$senig = new \App\Senig();
$doc = '00000000000000';
$result = $senig->enviaXMLRet('43171100000000000000570010001007561171170010-cte.xml', $doc, '127287');
if ($result == false) {
    echo $senig->getErrors();
} else {
//    echo '<pre>';
//    print_r($result->object);
    if ($result->object->listaMensagem->dStatus != 100) {
        echo $result->object->listaMensagem->dDetErr;
    }else{
        echo $result->object->dtRec;
        echo $result->object->cProtocolo;
        echo $result->object->listaMensagem->cStatus;
    }
}