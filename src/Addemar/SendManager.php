<?php

namespace Addemar;

use Addemar\Model\SendItem;

class SendManager
{
    private $connection;

    public function __construct(Connection $con)
    {
        $this->connection = $con->get();
    }

    public function sendTriggeredItem(SendItem $sendItem)
    {
        return $this->connection->sendTriggeredItem(
                                                    $sendItem->getTo(),
                                                    $sendItem->getCiid(),
                                                    $sendItem->getContent(),
                                                    $sendItem->getmin(),
                                                    $sendItem->getInsertContact(),
                                                    $sendItem->getupdateContact(),
                                                    $sendItem->getnoDoubles(),
                                                    $sendItem->getnoDoublesDays(),
                                                    $sendItem->getremoveUnsubscribe()
                                                    );
    }

}
