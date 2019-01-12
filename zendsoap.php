<?php
ini_set('display_errors', 1);

require 'vendor/autoload.php';

$endpoint = 'http://servsenigwin.virtuaserver.com.br/wsdl/WebAppAverba.exe/wsdl/IWebAppAverba';

try {

    $client = new Zend\Soap\Client($endpoint);

    $xml = file_get_contents('43190186933033000100570010001272871190127212-cte.xml');

    $result = $client->call('EnviaXMLRet',['fFileSend'=>$xml,'cCNPJ' => '86933033000100', 'nNumCTE'=>'127287']);
    $fo = fopen('return.xml', 'w');
    fwrite($fo, $client->getLastRequest());
    $fo = fopen('response.xml', 'w');
    fwrite($fo, $client->getLastResponse());
    print_r($result);

} catch (Exception $e) {
    echo '<prE>';
//    print_r($client);
    print_r($e->getMessage());
}