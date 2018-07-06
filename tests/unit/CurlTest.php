<?php

use PHPUnit\Framework\TestCase;
use EndpointApiConvertor\Curls\Curl;

class CurlTest extends TestCase
{
    public function testCurlResponseToTrue()
    {
        $url = 'https://api.instagram.com/v1/tags/natural?access_token=';
        $curl = new Curl( $url );
        $this->assertArrayHasKey( 'meta', $curl->getDecodeJson() );
    }
}

?>