<?php
ini_set('display_errors', 1);

require 'vendor/autoload.php';

$endpoint = 'http://servsenigwin.virtuaserver.com.br/wsdl/WebAppAverba.exe/wsdl/IWebAppAverba';
//
//$client = new \GuzzleHttp\Client(['base_uri' => 'http://servsenigwin.virtuaserver.com.br/wsdl/WebAppAverba.exe/wsdl/IWebAppAverba']);
//$res = $client->request('POST', 'EnviaXML');
////$res = $client->request('GET', 'http://servsenigwin.virtuaserver.com.br/wsdl/WebAppAverba.exe/wsdl/IWebAppAverba');
//echo $res->getStatusCode();
//// 200
//echo $res->getHeaderLine('content-type');
//// 'application/json; charset=utf8'
//echo $res->getBody();
//// '{"id": 1420053, "name": "guzzle", ...}'
//
//// Send an asynchronous request.
////$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
////$promise = $client->sendAsync($request)->then(function ($response) {
////    echo 'I completed! ' . $response->getBody();
////});
////$promise->wait();
///

$openSoapEnvelope = '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:tem="http://tempuri.org/">';
$soapHeader = '<soap:Header> 
                                    <tem:Authenticate>  
                                        <-- any header data goes here-->
                                    </tem:Authenticate>
                                </soap:Header>';

$closeSoapEnvelope = '</soap:Envelope>';


$soapBody = '<soap:Body>
                                <EnviaXML/>
                          </soap:Body>';

$xmlRequest = $openSoapEnvelope . $soapHeader . $soapBody . $closeSoapEnvelope;

$client = new \GuzzleHttp\Client([
        'base_url' => $endpoint,
]);

try {
    $response = $client->post(
            '/DataServiceEndpoint.svc',
            [
                    'body'    => $xmlRequest,
                    'headers' => [
                            'Content-Type' => 'text/xml',
                            'SOAPAction' => $endpoint.'/EnviaXML' // SOAP Method to post to
                    ]
            ]
    );

    var_dump($response);
} catch (\Exception $e) {
    echo 'Exception:' . $e->getMessage();
}

if ($response->getStatusCode() === 200) {
    // Success!
    $xmlResponse = simplexml_load_string($response->getBody()); // Convert response into object for easier parsing
} else {
    echo 'Response Failure !!!';
}
print_r($xmlResponse);