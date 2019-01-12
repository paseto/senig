<?php
/**
 * Created by PhpStorm.
 * User: giovani
 * Date: 1/12/19
 * Time: 5:30 PM
 */

namespace App;


use Zend\Soap\Client;

class Senig extends Base implements SenigInterface
{
    public function enviaXML($xml, $CNPJ)
    {
        // TODO: Implement enviaXML() method.
        $this->send();
    }

    public function enviaXMLRet($xml, $CNPJ, $numCTe)
    {
        // TODO: Implement enviaXMLRet() method.
    }

    public function enviaManifesto($xml, $CNPJ)
    {
        // TODO: Implement enviaManifesto() method.
    }

    public function enviaModelo($xml, $CNPJ)
    {
        // TODO: Implement enviaModelo() method.
    }

    public function enviaXMLCANRet($xml, $CNPJ, $numCTe)
    {
        // TODO: Implement enviaXMLCANRet() method.
    }


    public function send(\stdClass $stdClass)
    {
        try {
            $client = new Client(WSDL);
            $xml = file_get_contents('43190186933033000100570010001272871190127212-cte.xml');
            $result = $client->call('EnviaXMLRet', ['fFileSend' => $xml, 'cCNPJ' => '86933033000100', 'nNumCTE' => '127287']);
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
    }

}