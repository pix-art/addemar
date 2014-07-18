<?php
namespace Addemar\Manager;

use Addemar\Configuration\Settings;
use Addemar\Client\Connection;
use Addemar\Model\SendItem;

abstract class BaseManagerTest extends \PHPUnit_Framework_TestCase
{

    protected $manager;
    protected $connection;

    public function setUp()
    {
    	$connection = $this->getMockBuilder('Addemar\Client\Connection')
						   ->setMockClassName('Connection')
						   ->disableOriginalConstructor()
						   ->setMethods(
						   		array(
						   			'getMailgroupId',
						   			'sendTriggeredItem',
						   			'getContactStructure',
						   			'createContact',
						   			'removeContact',
						   			'getFieldId',
						   			'getContactId',
						   			'getContactData',
						   			'updateContact'
						   			)
						   		)
						   ->getMock();

		$connection->expects($this->any())
                   ->method('getMailgroupId')
                   ->with($this->equalTo('test'))
                   ->will($this->returnValue(array(1)));

        $senditem = new SendItem(1, 16);
        $connection->expects($this->any())
                   ->method('sendTriggeredItem')
                   ->with($this->equalTo($senditem->getTo()),
                          $this->equalTo($senditem->getCiid()),
                          $this->equalTo($senditem->getContent()),
                          $this->equalTo($senditem->getmin()),
                          $this->equalTo($senditem->getInsertContact()),
                          $this->equalTo($senditem->getupdateContact()),
                          $this->equalTo($senditem->getnoDoubles()),
                          $this->equalTo($senditem->getnoDoublesDays()),
                          $this->equalTo($senditem->getremoveUnsubscribe())
                   		 )
                   ->will($this->returnValue(1));

        $structure = $this->fakeStructure();
        $connection->expects($this->any())
                   ->method('getContactStructure')
                   ->will($this->returnValue($structure));

        $connection->expects($this->any())
                   ->method('createContact')
                   ->with($this->equalTo($structure))
                   ->will($this->returnValue(1));

        $connection->expects($this->any())
                   ->method('updateContact')
                   ->with($this->equalTo($structure))
                   ->will($this->returnValue(1));

        $connection->expects($this->any())
                   ->method('removeContact')
                   ->with($this->equalTo(1));

        $connection->expects($this->any())
                   ->method('getFieldId')
                   ->with($this->equalTo('email'))
                   ->will($this->returnValue(array(1)));

        $connection->expects($this->any())
                   ->method('getContactId')
                   ->with(
                   		  $this->equalTo(0),
                   		  $this->equalTo('info@example.com'),
                   		  $this->equalTo(1)
                   		  )
                   ->will($this->returnValue(array(1)));

        $userstructure = $structure;
        $userstructure->cid = 1;
        $userstructure->fields[0]->value = 'info@example.com';
        $connection->expects($this->any())
                   ->method('getContactData')
                   ->with($this->equalTo(1))
                   ->will($this->returnValue($userstructure));


        $this->connection = $connection;

        $this->manager = $this->createManager();
    }

    public function fakeStructure()
    {
    	$structure = new \stdClass();
    	$structure->cid = '';
    	$structure->fields = array();
    	$structure->fields[0] = new \stdClass();
    	$structure->fields[0]->name = 'email';
    	$structure->fields[0]->value = '';

    	return $structure;
    }

    public function tearDown()
    {
    	$this->connection = NULL;
    }

    abstract function createManager();

}
 