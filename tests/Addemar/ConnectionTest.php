<?php
namespace Addemar;

use Addemar\Configuration\Settings;
use Addemar\Client\Connection;

class ConnectionTest extends \PHPUnit_Framework_TestCase
{

    private $settings = null;

    public function setUp()
    {
        $this->settings = new Settings('20a745f958a056e38e3c0fa5c2edfebe');
    }

    /**
     * @test
     */
    public function it_should_be_a_valid_soap_client()
    {
        $connection = new Connection($this->settings);
        $this->assertInstanceOf('Addemar\Client\Connection', $connection);
        $this->assertInstanceOf('\SoapClient', $connection);
    }

}
 