<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Piwi
 * Date: 08.03.13
 * Time: 23:27
 * To change this template use File | Settings | File Templates.
 */
?>

<div id="wedify-header" class="wedify-header">

    <div class="container">
        <div class="row-fluid">
            <div class="span4">
                Logo
            </div>
            <div class="span8">
                <div class="menu">
                    <ul>
                        <li class="<?php echo (AdminTemplateParts::getInstance()->isCurrentAdminPage(array('dashboard')) ? 'active' : 'normal'); ?>">
                            <a href="<?php echo admin_url('') ?>">
                                Dashboard
                            </a>
                        </li>
                        <li class="<?php echo (AdminTemplateParts::getInstance()->isCurrentAdminPage(array('edit-page', 'page')) ? 'active' : 'normal'); ?>">
                            <a href="<?php echo admin_url('edit.php?post_type=page') ?>">
                                Seiten
                            </a>
                        </li>
                        <li class="<?php echo (AdminTemplateParts::getInstance()->isCurrentAdminPage('') ? 'active' : 'normal'); ?>">
                            <a href="#">
                                Bilder
                            </a>
                        </li>
                        <li class="<?php echo (AdminTemplateParts::getInstance()->isCurrentAdminPage('') ? 'active' : 'normal'); ?>">
                            <a href="#">
                                Einstellungen
                            </a>
                        </li>
                        <li class="<?php echo (AdminTemplateParts::getInstance()->isCurrentAdminPage('') ? 'active' : 'normal'); ?>">
                            <a href="#">
                                Account
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
