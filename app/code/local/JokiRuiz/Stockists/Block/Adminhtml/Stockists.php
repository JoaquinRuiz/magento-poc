<?php

class JokiRuiz_Stockists_Block_Adminhtml_Stockists extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'jokiruiz_stockists';
        $this->_controller = 'adminhtml_stockists';
        $this->_headerText = Mage::helper('jokiruiz_stockists')->__('Stockists');

        parent::__construct();

    }
}