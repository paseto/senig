<?php

namespace App;

interface SenigInterface
{
    public function enviaXML($xml, $CNPJ);
    public function enviaXMLRet($xml, $CNPJ, $numCTe);
    public function enviaManifesto($xml, $CNPJ);
    public function enviaModelo($xml, $CNPJ);
    public function enviaXMLCANRet($xml, $CNPJ, $numCTe);
}
