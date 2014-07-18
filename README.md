#PHP API Wrapper for Addemar [![Build Status](https://travis-ci.org/pix-art/addemar.svg)](https://travis-ci.org/pix-art/addemar)

Fully rewritten this old stuff. Is now unittested and contains 3 managers so far.

	ContactManager
	SendingManager
	ContactGroupsManager

All correspond with the structure of the addemar documentation here: [https://ws-email.addemar.com/docs/current/](https://ws-email.addemar.com/docs/current/)

##Settings

Settings are needed to connect to the client. In the constructor you can set your Token. Other parameters are pre-defined but can be updated.

	class Settings
	{
		private $token;
		private $version = 1.4;
		private $wsdl = 'https://ws-email.addemar.com/soap/wsdl/';
		private $options = array();
		
		...
	}
	
##Connection

Connection is an **extension** from the standard **SoapClient**. You don't need to know much about this component. Just pass your settings and this will give you a working connection.


##Managers

Managers are just grouping names for functions of a specific catergory. Each manager is contains function that you'll be able to find in the documentation from addemar. You can load a manager by calling the Factory.

**Example**

	use Addemar\Client\Connection;
	use Addemar\Client\Settings;
	
	$connection = new Connection(new Settings('Your Token'));
	ManagerFactory::create($connection, 'Addemar\Manager\ContactGroupsManager');
	
###ContactManager

**List of Functions:**


####getStructure()

Get structure from contact

*return:* structure ContactData

####create($structure)

Create a new contact

- ContactData $contact_data: structure: ContactData

*return:* integer (contact id)

####getContactId($status, $filter, $search_field_id = 1)

Get list of contact ids

- integer $status: 0=all 1=not unsubscribed 2=unsubscribed
- string $filter: Text to search on
- integer $search_field_id: Field id to search on

*return:* integer array (contact id's)


####getContactData($cid)

Get data from contact specified by the contact id

- integer $cid: Contact id

*return:* structure ContactData

####getFieldIdByName($name)

Get list of field ids

- string $parameter: Field parameter to search on

*return:* array (field id's)

####update($contact_data)

Update contact

- ContactData $contact_data: Structure: ContactData

*return:* boolean (true=successful, false=unsuccessful)

####delete($cid)

Remove/delete contact specified by the contact id

- integer $cid: Contact id

*return:* boolean (true=successful, false=unsuccessful)

####subscribeContact($cid, $mgid)

Subscribe contact specified by the contact id

- integer $cid: Contact id
- integer $mgid: Mailgroup id

*return:* boolean (true=successful, false=unsuccessful)

###ContactGroupsManager

**List of Functions:**


####getMailgroupId($name)

Get list of mailgroup ids

- string $name: Mailgroup name to search on

*return:* array (mailgroup id's)

###SendingManager

**List of Functions:**


####sendTriggeredItem(SendItem $senditem)

Send triggered item (Campaign Item exists)

object $senditem: instance of **Addemar\Model\SendItem**

*return:* integer (eid)