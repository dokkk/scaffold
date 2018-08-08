<?php
/**
 * Created by Domenico Caruso.
 * Date: 07.08.18
 * Time: 20:25
 */

/**
 * Backend controllers extending from Shopware_Controllers_Backend_Application
 */
class Shopware_Controllers_Backend_ScaffoldBackend extends Shopware_Controllers_Backend_Application
{
    public function indexAction()
    {
        $this->View()->assign('test', 'test');
    }
}