<?php

namespace Addemar\Manager;

use Addemar\Manager\AbstractManager;
use Addemar\Client\Connection;

class ContactGroupsManager extends AbstractManager
{
    public function __construct(Connection $connection)
    {
        parent::__construct($connection);
    }

    public function getMailgroupId($name)
    {
        return $this->connection->getMailgroupId($name);
    }

}
