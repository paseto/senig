<?php
ini_set('display_errors', 1);

//require 'vendor/autoload.php';

$endpoint = 'http://servsenigwin.virtuaserver.com.br/wsdl/WebAppAverba.exe/wsdl/IWebAppAverba';

try {
    $client = new SoapClient(
            $endpoint,
            array(
                    'location' => $endpoint,
                    'trace' => 1,
                    'soap_version'=>SOAP_1_2,
                    'use' => SOAP_LITERAL,
                    'style' => SOAP_DOCUMENT,
            )
    );
    $params = new \SoapVar("<Echo><Acquirer><Id>MyId</Id><UserId>MyUserId</UserId><Password>MyPassword</Password></Acquirer></Echo>", XSD_ANYXML);
    $result = $client->EnviaXML($params);
} catch (Exception $e) {
    echo '<prE>';
//    print_r($client);
    print_r($e->getMessage());
}