<?php

class CategoryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // query all device names and assign to list as search options
        $deviceQuery = DeviceQuery::create();

        $selectDevices = $deviceQuery->find();
        $deviceArray = array();
        foreach($selectDevices as $device) {
            $deviceArray[] = $device->getDeviceName();
        }

        $this->view->assign('deviceArray', $deviceArray);

        // query all category names and assign to list as search options
        $categoryQuery = CategoryQuery::create();

        $selectCategorys = $categoryQuery->find();
        foreach($selectCategorys as $category) {
            $categoryArray[] = $category->getCategoryName();
        }

        $this->view->assign('categoryArray', $categoryArray);
    }
}