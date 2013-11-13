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

        foreach($select as $value) {
            $row = array();
            $row['product id'           ] = $value->getProductId();
            $row['product category id'  ] = $value->getProductCategoryId();
            $row['product category name'] = $value->getCategory()->getCategoryName();
            $row['product name'         ] = $value->getProductName();
/*            $compat = $value->getDevice();
            $compatArray = array();
            foreach ($compat as $device) {
                $getName = $device->getDevice()->getDeviceName();
                $compatArray[] = $getName;
             }
            $row['compat'] = $compatArray;*/
            $productArray[] = $row;
        }
        $this->view->assign('productArray', $productArray);
    }

    public function addAction()
    {
    }
}