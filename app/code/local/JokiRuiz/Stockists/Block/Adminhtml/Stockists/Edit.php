<?php

class JokiRuiz_Stockists_Block_Adminhtml_Stockists_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'jokiruiz_stockists';
        $this->_controller = 'adminhtml_stockists';

        parent::__construct();

        $this->_updateButton('save', 'label', $this->__('Save Stockist'));
        $this->_updateButton('delete', 'label', $this->__('Delete Stockist'));
    }

    /**
     * Get Header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('jokiruiz_stockists')->getId()) {
            return $this->__('Edit Stockist');
        }
        else {
            return $this->__('New Stockist');
        }
    }
}