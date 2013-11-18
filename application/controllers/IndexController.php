<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $type = $this->getRequest()->getParam('type');
        $device = $this->getRequest()->getParam('device');

        if($type) {$this->_forward('search');}
        $query = ProductQuery::create()
        ->joinWithCompat()
            ->useCompatQuery()
                ->joinWithDevice()
            ->endUse()
        ->joinWithCategory();

        $select = $query->find();      

        $productArray = array();

        foreach($select as $product) {
            $row = array();
            $row['product-name' ] = $product->getProductName();
            $row['product-image'] = '<img src="/images/' . $product->getProductImage() . '" />';
            $row['product-price'] = '£' . $product->getProductPrice();
            /*
            $name = '';
            $compats = $product->getCompats();
            foreach ($compats as $device) {
                $name = $name . ' ' . $device->getDevice()->getDeviceName();
                $row['product-compatibility'] = $name;
            }
            */
            $productArray[] = $row;
        }

        $this->view->assign('productArray', $productArray);

        $typeArray = array();
        foreach($select as $product) {
            $typeArray[] = $product->getCategory()->getCategoryName();
        }
        $typeArray = array_unique($typeArray); // Should this be changed?

        $this->view->assign('typeArray', $typeArray);

        $deviceArray = array();

        foreach ($select as $compats) {
            $compats = $compats->getCompats();
            foreach ($compats as $deviceName) {
                $deviceName = $deviceName->getDevice()->getDeviceName();
                $deviceArray[] = $deviceName;
                //var_dump($var);
            }
        }
        $deviceArray = array_unique($deviceArray);

        $this->view->assign('deviceArray', $deviceArray);
        /*
        $new3 = new UserMain();
        $new3->setUserId(321);
        $new3->setUserName('Jack');
        $new3->setUserPass('SECRET');
        $new3->setUserEmail('jack@email.com');
        */
    }

    public function searchAction()
    {
        // GET PRODUCT IDS FROM DEVICE AND FROM CATEGORY
        // THEN USE ARRAY INTERSECT TO FIND COMMON IDS
        // THEN QUERY PRODUCT TABLE FILTERBYID

        // get and set parameters
        $typeParam = $this->getRequest()->getParam('type');
        $deviceParam = $this->getRequest()->getParam('device');
        $this->view->assign('selectedType', $typeParam);
        $this->view->assign('selectedDevice', $deviceParam);

        $categoryQuery = CategoryQuery::create();

        $selectTypes = $categoryQuery->find();
        $typeArray = array();
        foreach($selectTypes as $category) {
            $typeArray[] = $category->getCategoryName();
        }

        $this->view->assign('typeArray', $typeArray);

        $selectProductsByType = $categoryQuery
        ->filterByCategoryName($typeParam)
        ->joinWithProduct()
        ->find();

        // $selectFilter->getFirst()
        // use this to avoid bad querys

        $productArray = array();
        foreach ($selectProductsByType as $category) {
            $products = $category->getProducts();
            foreach ($products as $product) {
                $row = array();
                $row['product-name' ] = $product->getProductName();
                $row['product-image'] = '<img src="/images/' . $product->getProductImage() . '" />';
                $row['product-price'] = '£' . $product->getProductPrice();
                $productArray[] = $row;
            }
        }

        $this->view->assign('productArray', $productArray);


        $deviceQuery = DeviceQuery::create();

        $selectDevices = $deviceQuery->find();
        $deviceArray = array();
        foreach($selectDevices as $device) {
            $deviceArray[] = $device->getDeviceName();
        }

        $this->view->assign('deviceArray', $deviceArray);
            if ($deviceParam) {
            $selectProductsByDevice = $deviceQuery
            ->filterByDeviceName($deviceParam)
            ->joinWithCompat()
                ->useCompatQuery()
                    ->joinWithProduct()
                ->endUse()
            ->find();
        }
        else {
            $selectProductsByDevice = "nothing";
        }

        echo '<pre>' . $selectProductsByDevice;
        // $selectFilter->getFirst()
        // use this to avoid bad querys

    }
}
