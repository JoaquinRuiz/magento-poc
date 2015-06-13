<?php

class JokiRuiz_Stockists_Model_Stockists extends Mage_Core_Model_Abstract
{

    protected function _construct()
    {
        parent::_construct();
        $this->_init('jokiruiz_stockists/stockists');
    }

}