<?php
/**
 * Created by PhpStorm.
 * User: jokioki
 * Date: 10/6/15
 * Time: 20:04
 */ 
class JokiRuiz_Reviews_Model_Mysql4_Review extends Mage_Core_Model_Mysql4_Abstract
{

    protected function _construct()
    {
        $this->_init('jokiruiz_reviews/review', 'review_id');
    }

}