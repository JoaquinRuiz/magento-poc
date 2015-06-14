<?php

class JokiRuiz_Stockists_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->getLayout()->getBlock('jokiruiz_stockists')
            ->setData('stockists', Mage::getModel('jokiruiz_stockists/stockists')->getCollection());
        $this->renderLayout();
    }
}