<?php

namespace Addemar\Configuration;

class Settings
{
	private $token;
	private $version = 1.4;
	private $wsdl = 'https://ws-email.addemar.com/soap/wsdl/';
	private $options = array();

	public function __construct($token)
	{
		$this->token = $token;
	}

	public function setToken($token)
	{
		$this->token = $token;
	}

	public function getToken()
	{
		return $this->token;
	}
	
	public function setVersion($version)
	{
		$this->version = $version;
	}

	public function getVersion()
	{
		return $this->version;
	}

	public function setWsdl($wsdl)
	{
		$this->wsdl = $wsdl;
	}

	public function getWsdl()
	{
		return $this->wsdl;
	}

    public function getOptions()
    {
        return $this->options;
    }
 
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }
}