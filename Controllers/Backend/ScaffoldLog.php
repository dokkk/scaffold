<?php
/**
 * Created by Domenico Caruso.
 * Date: 08.08.18
 * Time: 09:25
 */

/**
 * Backend controllers extending from Shopware_Controllers_Backend_Application
 */
class Shopware_Controllers_Backend_ScaffoldLog extends Shopware_Controllers_Backend_Application
{
    public function indexAction()
    {
        $this->View()->assign('test', 'test');
    }
}