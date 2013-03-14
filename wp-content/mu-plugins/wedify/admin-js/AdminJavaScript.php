<?php
/**
 * Created by ${PROJECT}.
 * User: Piwi
 * Date: 11.03.13
 * Time: 21:54
 * File: ${FILE}
 */

class AdminJavaScript
{

    public function __construct()
    {
        add_action('init', array($this, 'bootstrapJavaScript'));
    }

    function bootstrapJavaScript()
    {
        wp_register_script('bootstrap-collapse', '/wp-content/mu-plugins/wedify/lib/bootstrap/js/bootstrap-collapse.js');
        wp_enqueue_script('bootstrap-collapse');
    }
}

$adminJavaScript = new AdminJavaScript();