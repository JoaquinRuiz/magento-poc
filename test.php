<?php

require_once 'app/Mage.php';

Mage::app();

$product = Mage::getModel("catalog/product")->load(887);
print '<pre>';print_r($product->getName()); print '</pre>';
$product->setMetaTitle('lalala')->save();
echo $product->getMetaTitle();

$products = Mage::getModel('catalog/product')->getCollection()->addAttributeToSelect(array('name', 'price'));
foreach ($products as $product) {
    print '<pre>';print_r($product); print '</pre>'; die();
}


//$product->sayHello();

$helper = Mage::helper("demo/customer");

//$helper->sayHi();

$category = Mage::getModel("catalog/category")->load(2);

//var_dump($category->getChildren());

$customer = Mage::getModel("customer/customer")->load(135);
//var_dump($customer->getData());

$customerData = Mage::helper("customer/data");

//var_dump($customerData->getCustomerName());

