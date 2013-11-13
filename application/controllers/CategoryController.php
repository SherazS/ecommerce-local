<?php

class CategoryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
		$criteria = new Criteria();
		$criteria->setLimit(10);
		$select  = CategoryPeer::doSelect($criteria);
		$categoryArray = array();

		foreach($select as $value) {
		    $row = array();
		    $row['category name'] = $value->getCategoryName();
		    
		    $categoryArray[] = $row;
		}
		$this->view->assign('categoryArray', $categoryArray);
    }
}