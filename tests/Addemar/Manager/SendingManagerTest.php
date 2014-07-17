<?php
namespace Addemar\Manager;

use Addemar\Factory\ManagerFactory;
use Addemar\Model\SendItem;

class SendingManagerTest extends BaseManagerTest
{

    public function setUp()
    {
        parent::setUp();
    }

    public function createManager()
    {
        return ManagerFactory::create($this->connection, 'Addemar\Manager\SendingManager');
    }

    public function tearDown(){}

    /**
     * @test
     */
    public function it_should_trigger_a_mail()
    {
        $eid = $this->manager->sendTriggeredItem(new SendItem(1, 16));
        $this->assertTrue(is_numeric($eid));
    }
}
 