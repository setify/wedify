<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Piwi
 * Date: 10.02.13
 * Time: 15:54
 * To change this template use File | Settings | File Templates.
 */

if (!class_exists('Admin_Page_Framework'))
    include_once( WPMU_PLUGIN_DIR . '/admin-page-framework/classes/admin-page-framework.php');

class UserProfile extends Admin_Page_Framework
{

    // 3. Define the setup method to set how many pages, page titles and icons etc.
    function SetUp()
    {

        // Create the root menu - specifies to which parent menu we are going to add sub pages.
        $this->SetRootMenu('Einstellungen');

        // Add the sub menus and the pages
        $this->AddSubMenu('Allgemein', // page and menu title
            'test1', // page slug - this will be the option name saved in the database
            plugins_url('img/demo_01_32x32.png', __FILE__)); // set the screen icon, it should be 32 x 32.
        $this->AddSubMenu('Impressum', // page and menu title
            'test2', // page slug - this will be the option name saved in the database
            plugins_url('img/demo_01_32x32.png', __FILE__)); // set the screen icon, it should be 32 x 32.

        // Enable heading page tabs.
        $this->ShowPageHeadingTabs(False);



        // Add form elements.
        // Here we have four sections as an example.
        // If you wonder what keys are need to be passed, please refer to http://en.michaeluno.jp/admin-page-framework/methods/
        $this->AddFormSections(
        // Section Arrays
            array(
                // Section Array 1
                array(
                    'pageslug' => 'test1',
                    'id' => 'bla1',
                    'title' => 'Überschrift',
                    'description' => 'Beschreibung',
                    'fields' =>
                    array(
                        array(
                            'id' => 'text',
                            'title' => 'Seitentitel',
                            'type' => 'text',
                        ),
                        array(
                            'id' => 'text8843',
                            'title' => 'Slogan',
                            'type' => 'text',
                        ),
                        array(
                            'id' => 'textarea',
                            'title' => 'Überschrift',
                            'description' => 'Kurze Beschreibung',
                            'type' => 'textarea',
                            'rows' => 6,
                            'cols' => 80
                        ),
                        array(
                            'id' => 'logo',
                            'title' => 'Logo',
                            'type' => 'image',
                            'visibility' => array(
                                'preview' => true,
                                'unset_button' => true,
                                'delete_button' => true
                            )
                        ),
                    )
                ),
            )
        );

        $this->AddFormSections(
        // Section Arrays
            array(
                // Section Array 1
                array(
                    'pageslug' => 'test2',
                    'id' => 'bla2',
                    'title' => 'Überschrift',
                    'description' => 'Beschreibung',
                    'fields' =>
                        // Field Arrays
                    array(
                        array(
                            'id' => 'text1',
                            'title' => 'Name',
                            'type' => 'text',
                        ),
                        array(
                            'id' => 'text2',
                            'title' => 'Firmenname',
                            'type' => 'text',
                        ),
                        array(
                            'id' => 'text3',
                            'title' => 'Straße, Nr',
                            'type' => 'text',
                        ),
                        array(
                            'id' => 'text4',
                            'title' => 'PLZ',
                            'type' => 'text',
                        ),
                        array(
                            'id' => 'text2',
                            'title' => 'Stadt',
                            'type' => 'text',
                        ),
                    )
                ),
            )
        );

    }

    /*
     * The first sub page.
     * */
    // Notice that the name of the method is 'do_' + page slug.
    // If you wonder what else we have for this kind of pre-defined methods and callbacks,
    // please refer to http://en.michaeluno.jp/admin-page-framework/hooks-and-callbacks/
    function do_test1()
    {
        submit_button(); // the save button
    }

    function validation_test1( $arrInput ) {
        $title = $arrInput['test1']['bla1']['text'];
        update_option( 'blogname', $title );

        return $arrInput;
    }

    function do_test2()
    {
        submit_button(); // the save button
    }

}

$userprofile = new UserProfile('demo_my_option_key');