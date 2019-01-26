<?php

namespace Paseto;

interface SenigInterface
{
    public function enviaXML(string $xml, string $CNPJ);
    public function enviaXMLRet(string $xml, string $CNPJ, string $numCTe);
    public function enviaManifesto($xml, $CNPJ);
    public function enviaModelo($xml, $CNPJ);
    public function enviaXMLCANRet($xml, $CNPJ, $numCTe);
}
