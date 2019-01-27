<?php
declare(strict_types=1);

namespace Paseto;

use Zend\Soap\Client;

class Senig extends Base implements SenigInterface
{
    public function enviaXML(string $xml, string $CNPJ)
    {
        // TODO: Implement enviaXML() method.
    }

    public function enviaXMLRet(string $xml, string $CNPJ, string $numCTe): bool
    {
        $std = new \stdClass();
        $std->method = 'EnviaXMLRet';
        $std->xml = $this->removeLatinCharacters($xml);
        $std->CNPJ = $CNPJ;
        $std->numCTe = $numCTe;
        return $this->send($std);
    }

    public function enviaManifesto(string $xml, string $CNPJ)
    {
        // TODO: Implement enviaManifesto() method.
    }

    public function enviaModelo(string $xml, string $CNPJ)
    {
        // TODO: Implement enviaModelo() method.
    }

    public function enviaXMLCANRet(string $xml, string $CNPJ, string $numCTe)
    {
        // TODO: Implement enviaXMLCANRet() method.
    }



    /**
     * @param \stdClass $stdClass
     * @return bool
     */
    private function send(\stdClass $stdClass): bool
    {
        try {
            $client = new Client(WSDL);
            if (!is_file($stdClass->xml)) {
                $this->setErrors('Arquivo não encontrado.');
                return false;
            }
            $xml = file_get_contents($stdClass->xml);
            if ($this->isValidXml($xml) === false) {
                $this->setErrors('Arquivo XML inválido.');
                return false;
            }
            $params = ['fFileSend' => $xml, 'cCNPJ' => $stdClass->CNPJ];
            if (isset($stdClass->numCTe)) {
                $params = array_merge($params, ['cNumCTE' => $stdClass->numCTe]);
            }
            $client->call($stdClass->method, $params);
            $request = $client->getLastRequest();
            $response = $client->getLastResponse();

            $std = new \stdClass();
            $std->request = $request;
            $std->response = $response;
            $std->object = $this->readReturn('return', $response);
            $this->setResponse($std);
            return true;
        } catch (\Exception $e) {
            $this->setErrors($e->getMessage());
            return false;
        }
    }
}
