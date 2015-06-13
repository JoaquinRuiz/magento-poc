<?php
/**
 * Created by PhpStorm.
 * User: jokioki
 * Date: 10/6/15
 * Time: 20:01
 */ 
class JokiRuiz_Reviews_Model_Review extends Mage_Core_Model_Abstract
{

    protected function _construct()
    {
        parent::_construct();
        $this->_init('jokiruiz_reviews/review');
    }

}