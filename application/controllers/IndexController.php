<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // get and set search parameters
        $categoryParam = $this->getRequest()->getParam('category');
        $deviceParam = $this->getRequest()->getParam('device');
        if ($categoryParam == 'angular') {
            return $this->forward('angular');
        }
        $this->view->assign('selectedCategory', $categoryParam);
        $this->view->assign('selectedDevice', $deviceParam);

        // query all device names and assign to list as search options
        $deviceQuery = DeviceQuery::create();

        $selectDevices = $deviceQuery->find();
        $deviceArray = array();
        foreach($selectDevices as $device) {
            $deviceArray[] = $device->getDeviceName();
        }

        $this->view->assign('deviceArray', $deviceArray);

        // if a device parameter was given
        // filter device table by name
        // then select all associated product ids with those devices
        if ($deviceParam) {
            $selectProductsByDevice = $deviceQuery
                ->filterByDeviceName($deviceParam)
                ->joinWithCompat()
                    ->useCompatQuery()
                        ->joinWithProduct()
                    ->endUse()
                ->find();

            foreach ($selectProductsByDevice as $compat) {
                $compat = $compat->getCompats();
                foreach ($compat as $productId) {
                    $deviceFilterArray[] = $productId->getProduct()->getProductId();
                } 
            }
        }
        // if no device parameter was given
        // select all associated product ids with all devices
        else {
            $selectProductsByDevice = $deviceQuery
                ->joinWithCompat()
                    ->useCompatQuery()
                        ->joinWithProduct()
                    ->endUse()
                ->find();

            foreach ($selectProductsByDevice as $compat) {
                $compat = $compat->getCompats();
                foreach ($compat as $productId) {
                    $deviceFilterArray[] = $productId->getProduct()->getProductId();
                } 
            }
        }

        // query all category names and assign to list as search options
        $categoryQuery = CategoryQuery::create();

        $selectCategorys = $categoryQuery->find();
        foreach($selectCategorys as $category) {
            $categoryArray[] = $category->getCategoryName();
        }

        $this->view->assign('categoryArray', $categoryArray);

        // if a category parameter was given
        // filter category table by name
        // then select all associated product ids with those category
        $categoryFilterArray = array();
        if ($categoryParam && $categoryParam != 'all') {
            $selectProductsByCategory = $categoryQuery
                ->filterByCategoryName($categoryParam)
                ->joinWithProduct()
                ->find();

            foreach ($selectProductsByCategory as $products) {
                $products = $products->getProducts();
                foreach ($products as $productId) {
                    $categoryFilterArray[] = $productId->getProductId();
                }
            }
        }
        // if no category parameter was given
        // select all associated product ids with all categories
        else {
            $selectProductsByCategory = $categoryQuery
                ->joinWithProduct()
                ->find();

            foreach ($selectProductsByCategory as $products) {
                $products = $products->getProducts();
                foreach ($products as $productId) {
                    $categoryFilterArray[] = $productId->getProductId();
                }
            }
        }

        // intersect product ids from device parameter and product ids from category parameter
        // filter product table by intersecting ids
        $productQuery = ProductQuery::create();
        $results = array_intersect($deviceFilterArray,$categoryFilterArray);

        $selectProducts = $productQuery
            ->filterByProductId($results)
            ->find();

        // if any products were selected
        // prepare selected products for echo in view
        // else print message
        $productArray = array();
        if($selectProducts->getFirst()){
            
            foreach($selectProducts as $product) {
                $productRow = array();
                $productRow['product-id'] = $product->getProductId();
                $productRow['product-name' ] = $product->getProductName();
                $productRow['product-image'] = '<img src="/images/' . $product->getProductImage() . '" />';
                $productRow['product-price'] = '£' . $product->getProductPrice();
                $productArray[] = $productRow;
            }
            
            $this->view->assign('productArray', $productArray);
        }
        else {
            $this->view->assign('productArray', 'Unfortunately we do not have that type of product. Please check back later.');
        }
    }

    public function angularAction()
    {
        $request = $this->getRequest();
        if ($request->isPost())
        {

            $productName = $request->getPost('product_name');
            $productCategoryId = $request->getPost('product_category');
            $productDeviceId = $request->getPost('product_category');
            $productDescription = $request->getPost('product_description');
            $productPrice = $request->getPost('product_price');
            $productQuantity = $request->getPost('product_quantity');

            $findProduct = ProductQuery::create();
            if ($findProduct->findOneByProductName($productName)) {
                echo 'Product exists.';
            }
            else {
                try
                {
                    $adapter = new Zend_File_Transfer_Adapter_Http();
                    $adapter->addValidator('Count',false, array('min'=>1, 'max'=>1))
                    ->addValidator('Size',false,array('max' => '0.5MB'))
                    ->addValidator('Extension',false,array('extension' => 'jpg','case' => true));
                    $adapter->setDestination('./images');
                    $file = $adapter->getFileInfo();
                    foreach($file as $fieldname=>$fileinfo) {
                        if (($adapter->isUploaded($fileinfo['name']))&& ($adapter->isValid($fileinfo['name']))) {
                            $adapter->receive($fileinfo['name']);
                            $newProduct = new Product();
                            $newProduct->setProductName($productName);
                            $newProduct->setProductCategoryId($productCategoryId);
                            $newProduct->setProductDescription($productDescription);
                            $newProduct->setProductPrice($productPrice);
                            $newProduct->setProductQuantity($productQuantity);
                            $newProduct->setProductImage($fileinfo['name']);
                            $newProduct->save();
                            $productId = $findProduct->findOneByProductName($productName)->getProductId();
                            $newCompat = new Compat();
                            $newCompat->setCompatProductId($productId);
                            $newCompat->setCompatDeviceId($productDeviceId);
                            $newCompat->save();
                            echo 'Product added.<br />';
                            echo $fileinfo['name'] . ' uploaded successfully.';
                        }
                    }
                    if($adapter->getMessages()) {
                        foreach($adapter->getMessages() as $message) {
                            echo $message . '<br />';
                        }
                    }
                }
                catch (Exception $exc) {
                    echo "Exception!\n";
                    echo $exc->getMessage();
                }
            }
        }
    }
}