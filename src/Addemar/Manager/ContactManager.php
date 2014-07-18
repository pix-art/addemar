<?php

namespace Addemar\Manager;

use Addemar\Manager\AbstractManager;
use Addemar\Client\Connection;

class ContactManager extends AbstractManager
{
    public function __construct(Connection $connection)
    {
        parent::__construct($connection);
    }

    public function getStructure()
    {
        return $this->connection->getContactStructure();
    }

    public function create($contact_data)
    {
        return $this->connection->createContact($contact_data);
    }

    public function getContactId($status, $filter, $search_field_id = 1)
    {
        return $this->connection->getContactId($status, $filter, $search_field_id);
    }

    public function getContactData($cid)
    {
        return $this->connection->getContactData($cid);
    }

    public function getFieldIdByName($name)
    {
        return $this->connection->getFieldId($name);
    }

    public function update($contact_data)
    {
        return $this->connection->updateContact($contact_data);
    }

    public function delete($cid)
    {
        return $this->connection->removeContact($cid);
    }

    public function subscribeContact($cid, $mgid)
    {
        return $this->connection->subscribeContact($cid,$mgid);
    }

}
