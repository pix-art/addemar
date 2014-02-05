<?php

namespace Addemar;

use Addemar\Model\SendItem;

class ContactManager
{
    private $connection;
    private $structure;
    private $structureObj;

    public function __construct(Connection $con)
    {
        $this->connection = $con->get();
        $this->structureObj = $this->connection->getContactStructure();
        $this->setStructure($this->structureObj);
    }

    public function setStructure($structureObj)
    {
        $structure = $this->object_to_array($structureObj);

        $data = array();

        foreach ($structure['fields'] as $field) {
            $data[$field['name']] = $field['value'];
        }

        $this->structure = $data;
    }

    public function getStructure()
    {
        return $this->structure;
    }

    public function createStructureObj($structure)
    {
        $struObj = $this->structureObj;
        foreach ($struObj->fields as $field) {
            if (array_key_exists($field->name, $structure)) {
                $field->value = $structure[$field->name];
            }
        }

        return $struObj;
    }

    private function object_to_array($obj)
    {
            $arrObj = is_object($obj) ? get_object_vars($obj) : $obj;
            foreach ($arrObj as $key => $val) {
                    $val = (is_array($val) || is_object($val)) ? $this->object_to_array($val) : $val;
                    $arr[$key] = $val;
            }

            return $arr;
    }

    public function createContact($struObj)
    {
        try {
            return $this->connection->createContact($struObj);
        } catch (\Exception $e) {
            return false;
        }
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
