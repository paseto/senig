<?php
ini_set('display_errors', 1);

require 'vendor/autoload.php';


$endpoint = 'http://servsenigwin.virtuaserver.com.br/wsdl/WebAppAverba.exe/wsdl/IWebAppAverba';

$interpreter = new \Meng\Soap\Interpreter($endpoint);
$request = $interpreter->request(
        'EnviaXML',
        [['LengthValue'=>'1', 'fromLengthUnit'=>'Inches', 'toLengthUnit'=>'Meters']]
);

print_r($request->getSoapMessage());