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

        $router->addRoute('typeslash', new Zend_Controller_Router_Route(
            'index/:type/',
             array('controller' => 'index', 'action' => 'index')
        ));
        $router->addRoute('typeindex', new Zend_Controller_Router_Route(
            'index/index/:type/',
             array('controller' => 'index', 'action' => 'index')
        ));
        $router->addRoute('typesearch', new Zend_Controller_Router_Route(
            'index/search/:type/',
             array('controller' => 'index', 'action' => 'search')
        ));

        $router->addRoute('deviceslash', new Zend_Controller_Router_Route(
            'index/:type/:device',
             array('controller' => 'index', 'action' => 'index')
        ));
        $router->addRoute('deviceindex', new Zend_Controller_Router_Route(
            'index/index/:type/:device',
             array('controller' => 'index', 'action' => 'index')
        ));
        $router->addRoute('devicesearch', new Zend_Controller_Router_Route(
            'index/search/:type/:device',
             array('controller' => 'index', 'action' => 'search')
        ));
    }    
}
