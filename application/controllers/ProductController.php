<?php

class ProductController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $query = ProductQuery::create()
        ->joinWithCompat()
        ->useCompatQuery()
        ->joinWithDevice()
        ->endUse()
        ->joinWithCategory();
        $select = $query->find();
        $productArray = array();

        foreach($select as $product) {
            $name = '';
            $row = array();
            $row['product-name' ] = $product->getProductName();
            $row['product-image'] = '<img src="/images/' . $product->getProductImage() . '" />';
            $row['product-price'] = '£' . $product->getProductPrice();
            /*
            $compats = $product->getCompats();
            foreach ($compats as $device) {
                $name = $name . ' ' . $device->getDevice()->getDeviceName();
                $row['product-compatibility'] = $name;
            }
            */
            $productArray[] = $row;
        }

        $categoryArray = array();
        foreach($select as $product) {
            $categoryArray[] = $product->getCategory()->getCategoryName();
        }
        $categoryArray = array_unique($categoryArray);
        $this->view->assign('categoryArray', $categoryArray);
        $this->view->assign('productArray', $productArray);
        $this->getRequest()->setParam('test','here');
    }

    public function searchAction()
    {
        $this->getRequest()->setParam('foo', 'bar');
        $uri = $this->getRequest()->getRequestUri();
        $param = $this->getRequest()->getParam('foo');   
        echo $uri . '<br /><br />' . $param;
    }
}