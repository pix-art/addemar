<?php

namespace Addemar;

use Addemar\Model\Settings;

class Connection
{
    private $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    public function get()
    {
        $url = $this->settings->getSoapUrl();
        $params = array();
        $params['token'] = $this->settings->getToken();
        $params['version'] = $this->settings->getVersion();

        $data = http_build_query($params);

        return new \SoapClient($url.'?'.$data);
    }
}
