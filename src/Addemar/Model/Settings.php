<?php

namespace Addemar\Model;


class Settings
{
	private $token;
	private $version = 1.4;
	private $soapUrl = 'https://ws-email.addemar.com/soap/wsdl/';
	private $clientId = false;

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

	public function setSoapUrl($soapUrl)
	{
		$this->soapUrl = $soapUrl;
	}

	public function getSoapUrl()
	{
		return $this->soapUrl;
	}

	public function setClientId($clientId)
	{
		$this->clientId = $clientId;
	}

	public function getClientId()
	{
		return $this->clientId;
	}

}