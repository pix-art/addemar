<?php

namespace Addemar\Client;

use Addemar\Configuration\Settings;

class Connection extends \SoapClient
{

    public function __construct(Settings $settings)
    {
        $params = array();
        $params['token'] = $settings->getToken();
        $params['version'] = $settings->getVersion();

        $data = http_build_query($params);

        $url = $settings->getWsdl().'?'.$data;

        parent::__construct($url, $settings->getOptions()); 
    }
}
