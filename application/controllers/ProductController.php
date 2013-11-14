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
        echo '<pre>' . $select;
        echo '<br />' . $select[0]->getCompats();
/*
        foreach($select as $value) {
            $row = array();
            $row['product id'           ] = $value->getProductId();
            $row['product category id'  ] = $value->getProductCategoryId();
            $row['product category name'] = $value->getCategory()->getCategoryName();
            $row['product name'         ] = $value->getProductName();
            $row['test'] = $value->getCompats()->getDevice()->getDeviceName();
            $productArray[] = $row;
        }*/
        $this->view->assign('productArray', $productArray);
    }

    public function addAction()
    {
    }
}