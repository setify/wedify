<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Piwi
 * Date: 10.03.13
 * Time: 13:23
 * To change this template use File | Settings | File Templates.
 */

class AdminTemplateParts {

    private $templateFolder = "";
    static private $instance = null;

    static public function getInstance()
     {
         if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
     }

    function __construct()
    {
        $this->templateFolder = dirname(__FILE__);

        // remove meta boxes
        add_action( 'admin_menu', array($this, 'removeMetaBoxes') );

        // add custom header
        add_action('in_admin_header', array($this, 'adminHeader'));

        // add custom header
        add_action('in_admin_footer', array($this, 'adminFooter'));
    }

    private function __clone(){}

    function adminHeader()
    {
        include_once $this->templateFolder . '/templates/header.php';
    }

    function adminFooter()
    {
        include_once $this->templateFolder . '/templates/footer.php';
    }

   function removeMetaBoxes(){
        remove_meta_box('pageparentdiv', 'page', 'normal');
    }

    public function isCurrentAdminPage($id) {
        $screen = get_current_screen();
        if(in_array($screen->id, $id)) {
            return true;
        } else {
            return false;
        }
    }

}

$adminTemplateParts = AdminTemplateParts::getInstance();