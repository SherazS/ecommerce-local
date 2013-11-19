<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

    protected function _initPropel()
    {
    	//require_once 'propel/Propel.php';
        Propel::init (APPLICATION_PATH . '/configs/propel-config.php');
    }

    protected function _initRoute()
    {
        $router = Zend_Controller_Front::getInstance()->getRouter();

        $router->addRoute('categoryslash', new Zend_Controller_Router_Route(
            'index/:category/',
             array('controller' => 'index', 'action' => 'index')
        ));
        $router->addRoute('categoryindex', new Zend_Controller_Router_Route(
            'index/index/:category/',
             array('controller' => 'index', 'action' => 'index')
        ));

        $router->addRoute('deviceslash', new Zend_Controller_Router_Route(
            'index/:category/:device',
             array('controller' => 'index', 'action' => 'index')
        ));
        $router->addRoute('deviceindex', new Zend_Controller_Router_Route(
            'index/index/:category/:device',
             array('controller' => 'index', 'action' => 'index')
        ));
    }    
}
