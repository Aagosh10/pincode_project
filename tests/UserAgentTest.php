<?php
/**
 * Created by PhpStorm.
 * User: aagoshaggarwal
 * Date: 02/07/18
 * Time: 4:29 PM
 */
class UserAgentTest extends PHPUnit_Framework_TestCase
{
    private $http;

    public function setUp()
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'https://httpbin.org/']);
    }

    public function tearDown() {
        $this->http = null;
    }
}