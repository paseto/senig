<?php
/**
 * Created by PhpStorm.
 * User: giovani
 * Date: 1/12/19
 * Time: 5:35 PM
 */

namespace App;


interface SenigInterface
{
    public function enviaXML($xml, $CNPJ);
    public function enviaXMLRet($xml, $CNPJ, $numCTe);
    public function enviaManifesto($xml, $CNPJ);
    public function enviaModelo($xml, $CNPJ);
    public function enviaXMLCANRet($xml, $CNPJ, $numCTe);

}