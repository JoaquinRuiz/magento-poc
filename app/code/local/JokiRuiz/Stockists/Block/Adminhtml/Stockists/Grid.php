<?php

class JokiRuiz_Stockists_Block_Adminhtml_Stockists_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('jokiruiz_stocksits');
        $this->setDefaultSort('increment_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _getCollectionClass()
    {
        return 'jokiruiz_stockists/stockists_collection';
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass())
            ->join(array('a' => 'core/store'), 'main_table.store_view = a.store_id', array(
                'store_id'  => 'store_id',
                'code'      => 'code',
                'name'      => 'name'
            ))->addExpressionFieldToSelect(
                'storeview_name',
                'CONCAT({{storeview_code}}, \' \', {{storeview_name}})',
                array('storeview_code' => 'a.code', 'storeview_name' => 'a.name'));

        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('jokiruiz_stockists');

        $this->addColumn('increment_id', array(
            'header' => $helper->__('Stockist #'),
            'index'  => 'increment_id'
        ));

        $this->addColumn('store_view', array(
            'header' => $helper->__('Store View'),
            'index'  => 'storeview_name'
        ));

        $this->addColumn('address', array(
            'header' => $helper->__('Address'),
            'index'  => 'address'
        ));

        $this->addColumn('postcode', array(
            'header' => $helper->__('Postcode'),
            'index'  => 'postcode'
        ));

        $this->addColumn('city', array(
            'header' => $helper->__('City'),
            'index'  => 'city'
        ));

        $this->addColumn('country', array(
            'header' => $helper->__('Country'),
            'index'  => 'country'
        ));

        $this->addColumn('email', array(
            'header' => $helper->__('Email'),
            'index'  => 'email'
        ));

        $this->addColumn('phone', array(
            'header' => $helper->__('Phone'),
            'index'  => 'phone'
        ));

    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }


}