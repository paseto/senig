<?php

/**
 * Assembles and dispatches the SOAP request body XML and returns the
 * Response body XML from the vendor API.
 */
class Request
{
    /**
     * @var \SoapClient
     */
    protected $client;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(\SoapClient $client)
    {
        $this->client = $client;
//        $this->logger = $logger;
    }

    public function call()
    {
        if (function_exists('xdebug_disable')) {
            xdebug_disable();
        }

        $xml = '<EnviaXML>
            <fFileSend>2018-12-06T11:23:02</fFileSend>
            <cCNPJ>{6410090-24138-1833-176}</cCNPJ>            
        </EnviaXML>';
        $soapBody = new \SoapVar($xml, \XSD_ANYXML);

        $return = $this->client->__SoapCall('Create', array($soapBody));
//        $this->logger->debug('Sent SOAP Request XML: ' . $this->getLastRequestXml());

        return $return;
    }

    public function getSoapClient()
    {
        return $this->client;
    }

    /**
     * Get most recent XML Request sent to SOAP server
     *
     * @return string
     */
    public function getLastRequestXml()
    {
        return $this->client->__getLastRequest();
    }

    /**
     * Get most recent XML Response returned from SOAP server
     *
     * @return string
     */
    public function getLastResponseXml()
    {
        return $this->client->__getLastResponse();
    }
}
