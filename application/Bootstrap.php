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

        // category search routers
        $router->addRoute('categoryslash', new Zend_Controller_Router_Route(
            'index/:category/',
             array('controller' => 'index', 'action' => 'index')
        ));
        $router->addRoute('categoryindex', new Zend_Controller_Router_Route(
            'index/index/:category/',
             array('controller' => 'index', 'action' => 'index')
        ));

        // device search routers
        $router->addRoute('deviceslash', new Zend_Controller_Router_Route(
            'index/:category/:device',
             array('controller' => 'index', 'action' => 'index')
        ));
        $router->addRoute('deviceindex', new Zend_Controller_Router_Route(
            'index/index/:category/:device',
             array('controller' => 'index', 'action' => 'index')
        ));

        // product page router
        $router->addRoute('product', new Zend_Controller_Router_Route(
            'product/:product_id',
             array('controller' => 'product', 'action' => 'index')
        ));

        // edit user profile router
        $router->addRoute('useredit', new Zend_Controller_Router_Route(
            'user/edit/:user_id',
             array('controller' => 'user', 'action' => 'edit')
        ));

        // delete user profile router
        $router->addRoute('userdelete', new Zend_Controller_Router_Route(
            'user/delete/:user_id',
             array('controller' => 'user', 'action' => 'delete')
        ));
    }    
}
