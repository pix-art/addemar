<?php
namespace Addemar\Manager;

use Addemar\Factory\ManagerFactory;

class ContactGroupsManagerTest extends BaseManagerTest
{

    public function setUp()
    {
        parent::setUp();
    }

    public function createManager()
    {
        return ManagerFactory::create($this->connection, 'Addemar\Manager\ContactGroupsManager');
    }

    public function tearDown(){}

    /**
     * @test
     */
    public function it_should_return_a_valid_group()
    {
        $groups = $this->manager->getMailgroupId('test');
        $this->assertTrue(is_array($groups));
        $this->assertTrue(isset($groups[0]));
    }

}
 