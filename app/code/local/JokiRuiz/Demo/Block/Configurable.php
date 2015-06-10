<?php

class JokiRuiz_Demo_Block_Configurable extends Mage_Core_Block_Template
{
    public function getConfigurableProducts()
    {
        $category = Mage::getModel('catalog/category')->load(68);
        $products = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect(array('name', 'price', 'url_key'))
            ->addCategoryFilter($category);

        return $products;
    }
}