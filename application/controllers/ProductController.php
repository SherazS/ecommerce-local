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
        ->endUse();
        $select = $query->find();
        $productArray = array();

        foreach($select as $item) {
            $name = '';
            $row = array();
            $row['product-name' ] = $item->getProductName();
            $row['product-image'] = '<img src="images/' . $item->getProductImage() . '" />';
            $row['product-price'] = '£' . $item->getProductPrice();

            /*$compats = $item->getCompats();
            foreach ($compats as $device) {
                $name = $name . ' ' . $device->getDevice()->getDeviceName();
                $row['product-compatibility'] = $name;
            }*/
            $productArray[] = $row;

        }
        $this->view->assign('productArray', $productArray);
    }

    public function addAction()
    {
    }
}