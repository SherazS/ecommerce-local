<?php

class ProductController extends Zend_Controller_Action
{

    public function init()
    {

    }

    public function indexAction()
    {
        $filter = $this->getRequest()->getParam('filter');
        if($filter) {$this->_forward('search');}
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

        $categoryArray = array();
        foreach($select as $product) {
            $categoryArray[] = $product->getCategory()->getCategoryName();
        }
        $categoryArray = array_unique($categoryArray); // Should this be changed?

        $this->view->assign('categoryArray', $categoryArray);

    }

    public function searchAction()
    {
        $filter = $this->getRequest()->getParam('filter');
        $query = CategoryQuery::create();

        $selectCategorys = $query->find();
        $categoryArray = array();
        foreach($selectCategorys as $category) {
            $categoryArray[] = $category->getCategoryName();
        }

        $this->view->assign('categoryArray', $categoryArray);

        $selectFilter = $query
        ->filterByCategoryName($filter)
        ->joinWithProduct()
        ->find();

        // die(var_dump($selectFilter->getFirst()));
        // use this to avoid bad querys

        $productArray = array();
        foreach ($selectFilter as $category) {
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

    }
}