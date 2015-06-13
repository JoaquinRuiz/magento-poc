<?php

class JokiRuiz_Stockists_Model_Mysql4_Stockists extends Mage_Core_Model_Mysql4_Abstract
{

    protected function _construct()
    {
        $this->_init('jokiruiz_stockists/stockists', 'increment_id');
    }

}