<?php

class CategoryController extends Zend_Controller_Action
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

        foreach($select as $item) {
            $name = '';
            $row = array();
            $row['product-name' ] = $item->getProductName();
            $row['product-image'] = '<img src="/images/' . $item->getProductImage() . '" />';
            $row['product-price'] = '£' . $item->getProductPrice();

            $compats = $item->getCompats();
            foreach ($compats as $device) {
                $name = $name . ' ' . $device->getDevice()->getDeviceName();
                $row['product-compatibility'] = $name;
            }
            $productArray[] = $row;
        }


        $test = $select->getCompats();
        $this->view->assign('test', $test);

  /*    
        $query = CategoryQuery::create();
        $select = $query->find();

        $categoryArray = array();
        foreach($select as $value) {
            $categoryArray[] = $value->getCategoryName();
        }

        $this->view->assign('categoryArray', $categoryArray);*/
        $this->view->assign('productArray', $productArray);
    }
}