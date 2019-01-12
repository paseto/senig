<?php
ini_set('display_errors', 1);

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Meng\AsyncSoap\Guzzle\Factory;

$endpoint = 'http://servsenigwin.virtuaserver.com.br/wsdl/WebAppAverba.exe/wsdl/IWebAppAverba';

$factory = new Factory();

$c = new Client();


$client = $factory->create($c, $endpoint);

$cte = file_get_contents('43171186933033000100570010001007561171170010-cte.xml');

// async call
//$promise = $client->callAsync('EnviaXML', [['fFileSend'=>$cte,'00000000000000']]);
//$result = $promise->wait();
//print_r($result);

// sync call
//$result = $client->call('EnviaXMLRet', [['fFileSend' => $cte, 'cCNPJ' => '86933033000100', 'cNumCTE'=>123]]);
$body = $c->request('EnviaXMLRet',$endpoint)->getBody();
$body->rewind();
$xml = $body->getContents();

$fo = fopen('return.xml', 'a');
fwrite($fo, $xml);
//echo '<pre>';
//header('Content-type: text/xml; charset=UTF-8');
print_r($body);

// magic method
//$promise = $client->GetStatistics(['X' => [1,2,3]]);
//$result = $promise->wait();