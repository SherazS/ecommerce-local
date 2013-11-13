<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {/*
        $c = new Criteria();
        $c->setLimit(10);

        $select  = ProductPeer::doSelect($c);

        echo "<br /><br /><br /><br /><p>Products</p>";

        $productArray = array();

        foreach($select as $value) {
            $row = array();
            $row['product id'           ] = $value->getProductId();
            $row['product category id'  ] = $value->getProductCategoryId();
            $row['product category name'] = $value->getCategory()->getCategoryName();
            $row['product name'         ] = $value->getProductName();
            $compat = CompatQuery::create()->filterByCompatProductId($value->getProductId())->find();
            $row['compatibility'] = '';
            foreach ($compat as $device) {
                $row['compatibility'] = $row['compatibility'] . $device->getDevice()->getDeviceName() . ' ';
             } 

            $productArray[] = $row;
        }
        foreach ($productArray as $row) {
            foreach($row as $key=>$value) {   
                echo $key . ": ". $value . "<br />";
            }
            echo "<br />";
        }

        $select  = CategoryPeer::doSelect($c);

        echo "<p>Categories</p>";

        $categoryArray = array();

        foreach($select as $value) {
            $row = array();
            $row['category id'  ] = $value->getCategoryId();
            $row['category name'] = $value->getCategoryName();
            
            $categoryArray[] = $row;
        }
        foreach ($categoryArray as $row) {
            foreach($row as $key=>$value) {   
                echo $key . ": ". $value . "<br />";
            }
            echo "<br />";
        }

        $select  = DevicePeer::doSelect($c);

        echo "<p>Devices</p>";

        $deviceArray = array();

        foreach($select as $value) {
            $row = array();
            $row['device id'  ] = $value->getDeviceId();
            $row['device name'] = $value->getDeviceName();
            
            $deviceArray[] = $row;
        }
        foreach ($deviceArray as $row) {
            foreach($row as $key=>$value) {   
                echo $key . ": ". $value . "<br />";
            }
            echo "<br />";
        }

/*
        $new2 = new CmsCategory();
        $new2->setCatName('Newer');
        $new3 = new UserMain();
        $new3->setUserId(321);
        $new3->setUserName('Jack');
        $new3->setUserPass('SECRET');
        $new3->setUserEmail('jack@email.com');
*/

    }
}
