<?php

namespace Addemar\Manager;

use Addemar\Manager\AbstractManager;
use Addemar\Client\Connection;
use Addemar\Model\SendItem;

class SendingManager extends AbstractManager
{
    public function __construct(Connection $connection)
    {
        parent::__construct($connection);
    }

    public function sendTriggeredItem(SendItem $senditem)
    {
        return $this->connection->sendTriggeredItem(
                                                    $senditem->getTo(),
                                                    $senditem->getCiid(),
                                                    $senditem->getContent(),
                                                    $senditem->getmin(),
                                                    $senditem->getInsertContact(),
                                                    $senditem->getupdateContact(),
                                                    $senditem->getnoDoubles(),
                                                    $senditem->getnoDoublesDays(),
                                                    $senditem->getremoveUnsubscribe()
                                                    );
    }

}
