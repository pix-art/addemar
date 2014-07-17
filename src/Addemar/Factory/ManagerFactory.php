<?php

namespace Addemar\Factory;

use Addemar\Configuration\Settings;
use Addemar\Client\Connection;

class ManagerFactory
{
    public static function create(Connection $connection, $namespace)
    {        
        $manager = new $namespace($connection);
        return $manager;
    }

} 