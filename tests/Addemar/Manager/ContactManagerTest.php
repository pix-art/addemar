<?php
namespace Addemar\Manager;

use Addemar\Factory\ManagerFactory;

class ContactManagerTest extends BaseManagerTest
{

    private $testContact = false;

    public function setUp()
    {
        parent::setUp();
        $this->testContact = $this->createDummy();
    }

    public function createManager()
    {
        return ManagerFactory::create($this->connection, 'Addemar\Manager\ContactManager');
    }

    public function tearDown()
    {
        if ($this->testContact) {
            $this->manager->delete($this->testContact);
        }
    }

    /**
     * @test
     */
    public function it_should_be_a_valid_contact_manager()
    {
        $this->assertInstanceOf('Addemar\Manager\ContactManager', $this->manager);
    }

    /**
     * @test
     */
    public function it_should_return_a_valid_structure()
    {
        $structure = $this->manager->getStructure();
        $this->is_valid_structure($structure);
    }

    /**
     * @test
     */
    public function it_should_return_a_field_id()
    {
        $field_ids = $this->manager->getFieldIdByName('email');
        $this->assertTrue(is_array($field_ids));
        $this->assertTrue(in_array('1', $field_ids));
    }

    /**
     * @test
     */
     public function it_should_create_a_contact()
    {
        $cid = $this->createDummy();
        $this->assertTrue(is_numeric($cid));
    }

    private function createDummy()
    {
        $structure = $this->manager->getStructure();

        $structure->fields[0]->value = 'info@example.com';

        return $this->manager->create($structure);
    }

    /**
     * @test
     */
    public function it_should_fetch_a_contact_id()
    {
        $field_ids = $this->manager->getFieldIdByName('email');
        $contact_ids = $this->manager->getContactId(0,"info@example.com",$field_ids[0]);
        $this->assertTrue(is_array($contact_ids));
        $this->assertTrue(in_array($this->testContact, $contact_ids));
    }

    /**
     * @test
     */
    public function it_should_fetch_a_contact()
    {
        $structure = $this->manager->getContactData($this->testContact);
        $this->is_valid_structure($structure, $this->testContact);
    }

    /**
     * @test
     * TODO
     */
    public function it_should_update_a_contact()
    {
        $structure = $this->manager->getContactData($this->testContact);
        $structure->fields[0]->value = 'info@example.be';
        $this->manager->update($structure);

        $newstructure = $this->manager->getContactData($this->testContact);

        $this->is_valid_structure($newstructure, $this->testContact);
        $this->assertEquals($newstructure->fields[0]->value, 'info@example.be');
    }

    /**
     * @test
     */
    public function it_should_delete_a_contact()
    {
        $this->manager->delete($this->testContact);
        $this->testContact = false;
    }


    private function is_valid_structure($structure, $id = false)
    {
        $this->assertNotEmpty($structure);
        $this->assertObjectHasAttribute('fields', $structure);
        $this->assertObjectHasAttribute('cid', $structure);

        if ($id) {
            $this->assertEquals($this->testContact, $structure->cid);
            $this->assertTrue($structure->fields[0]->value != '');
        }
    }
}
 