<?php

namespace Paseto;

interface SenigInterface
{
    public function enviaXML(string $xml, string $CNPJ);

    /**
     * @param string $xml File
     * @param string $CNPJ Doc
     * @param string $numCTe
     * @return bool
     */
    public function enviaXMLRet(string $xml, string $CNPJ, string $numCTe): bool;

    public function enviaManifesto(string $xml, string $CNPJ);

    public function enviaModelo(string $xml, string $CNPJ);

    public function enviaXMLCANRet(string $xml, string $CNPJ, string $numCTe);
}
