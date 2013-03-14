<?php
/**
 * Created by ${PROJECT}.
 * User: Piwi
 * Date: 11.03.13
 * Time: 20:52
 * File: ${FILE}
 */

class AdminDashboard
{

    static private $instance = null;
    private $userData = array();

    function setUserData($prop, $userData)
    {
        $this->userData[$prop] = $userData;
    }

    function getUserData()
    {
        return $this->userData;
    }



    static public function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    function __construct()
    {
        add_action('admin_menu', array($this, 'createDashboard'));
        add_action('load-index.php', array($this, 'dashboardRedirect'));
        add_action('admin_init', array($this, 'dataSetup'));
    }

    private function __clone()
    {
    }

    function createDashboard()
    {
        add_dashboard_page('Dashboard', 'Dashboard', 'read', 'dashboard', array($this, 'dashboardPage'));
    }

    function dashboardPage()
    {
        include_once dirname(__FILE__) . '/templates/dashboard.php';
    }

    function dashboardRedirect()
    {
        if (is_admin()) {
            $screen = get_current_screen();

            if ($screen->base == 'dashboard') {

                wp_redirect(admin_url('index.php?page=dashboard'));

            }
        }
    }

    function dataSetup() {
        $this->userData();
    }

    function userData(){
        global $current_user;
        get_currentuserinfo();
        $this->setUserData('id', $current_user->ID);
        $this->setUserData('firstName', $current_user->user_firstname);
        $this->setUserData('lastName', $current_user->user_lastname);
    }

}

$adminDashboard = AdminDashboard::getInstance();