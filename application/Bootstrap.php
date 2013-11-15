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
        $router->addRoute('filterslash', new Zend_Controller_Router_Route(
            'product/:filter',
             array('controller' => 'product', 'action' => 'index')
        ));
        $router->addRoute('filterindex', new Zend_Controller_Router_Route(
            'product/index/:filter',
             array('controller' => 'product', 'action' => 'index')
        ));
        $router->addRoute('filtersearch', new Zend_Controller_Router_Route(
            'product/search/:filter',
             array('controller' => 'product', 'action' => 'search')
        ));
    }    
}
