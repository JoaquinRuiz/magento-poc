<?php

class JokiRuiz_Stockists_Adminhtml_StockistsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Stockists'));
        $this->loadLayout();
        $this->_setActiveMenu('stockists');
        $this->_addContent('aqui toyyy admini');
        $this->renderLayout();
    }

}