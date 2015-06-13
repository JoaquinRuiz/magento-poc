<?php
/**
 * Created by PhpStorm.
 * User: jokioki
 * Date: 12/6/15
 * Time: 10:17
 */

class JokiRuiz_Reviews_Block_Adminhtml_Reviews extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'jokiruiz_reviews';
        $this->_controller = 'adminhtml_reviews';
        $this->_headerText = 'Order Reviews';

        parent::__construct();
        $this->_removeButton('add');
    }
}