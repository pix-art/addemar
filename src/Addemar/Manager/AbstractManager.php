<?php

namespace Addemar\Manager;

use Addemar\Client\Connection;
use Addemar\Configuration\Settings;

abstract class AbstractManager
{
    protected $connection;

    public function __construct(Connection $connection)
    {
    	$this->connection = $connection;
    }

}
