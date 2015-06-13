<?php
/**
 * Created by PhpStorm.
 * User: jokioki
 * Date: 10/6/15
 * Time: 20:05
 */ 
class JokiRuiz_Reviews_Model_Mysql4_Review_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

    protected function _construct()
    {
        $this->_init('jokiruiz_reviews/review');
    }

}