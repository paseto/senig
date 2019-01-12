<?php
/**
 * Created by PhpStorm.
 * User: giovani
 * Date: 1/12/19
 * Time: 5:30 PM
 */

namespace App;

const WSDL = 'http://servsenigwin.virtuaserver.com.br/wsdl/WebAppAverba.exe/wsdl/IWebAppAverba';

abstract class Base
{

    private $request;
    private $response;

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     * @return Base
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param mixed $request
     * @return Base
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    protected static function removeLatinCharacters($value, $normalize = 'n')
    {
        $from = 'áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ';
        $to = 'aaaaeeiooouucAAAAEEIOOOUUC';

        $keys = array();
        $values = array();
        preg_match_all('/./u', $from, $keys);
        preg_match_all('/./u', $to, $values);
        $mapping = array_combine($keys[0], $values[0]);
        $value = strtr($value, $mapping);
        if ($normalize == 'u') {
            $value = strtoupper(strtolower($value));
        }
        if ($normalize == 'l') {
            $value = strtolower($value);
        }

        return $value;
    }


}