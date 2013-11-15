<?php

class CategoryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $query = CategoryQuery::create();

        $selectCategorys = $query->find();
        $categoryArray = array();
        foreach($selectCategorys as $category) {
            $categoryArray[] = $category->getCategoryName();
        }

        $this->view->assign('categoryArray', $categoryArray);
    }
}