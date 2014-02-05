<?php

namespace Addemar\Model;

class SendItem
{
    private $to;
    private $ciid;
    private $content = null;
    private $min = '0';
    private $insertContact = false;
    private $updateContact = false;
    private $noDoubles = false;
    private $noDoublesDays = '';
    private $removeUnsubscribe = false;

    public function __construct($to, $ciid)
    {
        $this->to = $to;
        $this->ciid = $ciid;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setciid($ciid)
    {
        $this->ciid = $ciid;
    }

    public function getciid()
    {
        return $this->ciid;
    }

    public function setcontent($content)
    {
        $this->content = $content;
    }

    public function getcontent()
    {
        return $this->content;
    }

    public function setmin($min)
    {
        $this->min = $min;
    }

    public function getmin()
    {
        return $this->min;
    }

    public function setinsertContact($insertContact)
    {
        $this->insertContact = $insertContact;
    }

    public function getinsertContact()
    {
        return $this->insertContact;
    }

    public function setupdateContact($updateContact)
    {
        $this->updateContact = $updateContact;
    }

    public function getupdateContact()
    {
        return $this->updateContact;
    }

    public function setnoDoubles($noDoubles)
    {
        $this->noDoubles = $noDoubles;
    }

    public function getnoDoubles()
    {
        return $this->noDoubles;
    }

    public function setnoDoublesDays($noDoublesDays)
    {
        $this->noDoublesDays = $noDoublesDays;
    }

    public function getnoDoublesDays()
    {
        return $this->noDoublesDays;
    }

    public function setremoveUnsubscribe($removeUnsubscribe)
    {
        $this->removeUnsubscribe = $removeUnsubscribe;
    }

    public function getremoveUnsubscribe()
    {
        return $this->removeUnsubscribe;
    }

}
