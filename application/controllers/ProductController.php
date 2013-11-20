<?php

class ProductController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // get and set search parameters
        $idParam = $this->getRequest()->getParam('product_id');

        $productQuery = ProductQuery::create();

        $selectProduct = $productQuery->findOneByProductId($idParam);

        // if a product was selected
        // prepare selected product for echo in view
        // else print message
        //
        // Find a neater solution to styling?
        $productArray = array();
        if($selectProduct) {
            $productArray['product-page-name' ] = '<div id="product-page-name">' .
                                                $selectProduct->getProductName() . '</div>';
            $productArray['product-page-image'] = '<div id="product-page-image"><img src="/images/' .
                                                $selectProduct->getProductImage() . '" /></div>';
            $productArray['product-page-id'] = '<div class="product-page-heading">Product ID </div><div class="product-page-text">' .
                                                $selectProduct->getProductId() . '</div>';
            $productArray['product-page-description'] = '<div class="product-page-heading">Product Description</div><div class="product-page-text">' .
                                                $selectProduct->getProductDescription() . '</div>';
            $productArray['product-page-quantity'] = '<div class="product-page-heading">Product Quantity</div><div class="product-page-text">' .
                                                $selectProduct->getProductQuantity() . '</div>';
            $productArray['product-page-price'] = '<div class="product-page-heading">Product Price</div><div class="product-page-text">' .
                                                '£' . $selectProduct->getProductPrice() . '</div>';
            $this->view->assign('productArray', $productArray);
        }
        else {
            $this->view->assign('productArray', 'Unfortunately we could not find your product. Please try again.');
        }
    }
}