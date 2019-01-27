<?php
/**
 * Created by PhpStorm.
 * User: giovani
 * Date: 1/27/19
 * Time: 11:56 AM
 */

namespace Paseto;

use PHPUnit\Framework\TestCase;

class SenigTest extends TestCase
{
    public function possibleData()
    {
        return [
                [
                        __DIR__.'/../../examples/43171100000000000000570010001007561171170010-cte.xml',
                        '00000000000000',
                        '000000001'
                ]
        ];
    }

    /**
     * @dataProvider possibleData
     */
    public function testEnviaXMLRet($xml, $CNPJ, $numCTe)
    {
        $this->assertFileExists($xml);
        $this->assertEquals(14, strlen($CNPJ));
        $this->assertEquals(9, strlen($numCTe));

    }
}
