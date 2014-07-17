<?php
namespace Addemar\Manager;

use Addemar\Configuration\Settings;
use Addemar\Client\Connection;

abstract class BaseManagerTest extends \PHPUnit_Framework_TestCase
{

    protected $manager;
    protected $connection;

    public function setUp()
    {
    	$settings = new Settings('25453451234');
    	$this->connection = new Connection($settings);
        $this->manager = $this->createManager();
    }

    abstract function createManager();

}
 