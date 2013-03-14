<?php
/**
 * Class SystemStyle
 */
class AdminStyle
{

    /**
     *
     */
    public function __construct()
    {
        add_action('init', array($this, 'systemStyle'));
        // remove admin bar
        show_admin_bar(false);
    }

    /**
     *
     */
    function systemStyle()
    {
        wp_register_style('master-min', plugins_url('css/master.min.css', __FILE__));
        wp_enqueue_style('master-min');
        if(!is_super_admin()) {
            wp_register_style('client-min', plugins_url('css/client.min.css', __FILE__));
            wp_enqueue_style('client-min');
        }
    }

}

$systemStyle = new AdminStyle();