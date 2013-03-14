<?php
class SystemMails
{
    public function __construct()
    {
        add_filter('wp_mail', array($this, 'changeMailHeader'));
    }

    function changeMailHeader($params)
    {
        $params['headers'] = 'Content-type: text/html';
        return $params;
    }

}

$SystemMails = new SystemMails();
