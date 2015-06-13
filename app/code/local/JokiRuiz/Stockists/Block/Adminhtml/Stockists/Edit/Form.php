<?php
class JokiRuiz_Stockists_Block_Adminhtml_Stockists_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init class
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('jokiruiz_stockists_stockists_form');
        $this->setTitle($this->__('Stockist form'));
    }


    private function getStoreViewsArray()
    {
        $storeViews = Mage::getModel('core/store')->getCollection()
            ->addFieldToSelect('code')
            ->addFieldToSelect('store_id');
        $arrayWeno = array();

        foreach ($storeViews as $storeView) {
            $arrayWeno[$storeView->getStoreId()] = $storeView->getCode();
        }

        return $arrayWeno;
    }


    /**
     * Setup form fields for inserts/updates
     *
     * return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $model = Mage::registry('jokiruiz_stockists');

        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('checkout')->__('Stockist Information'),
            'class'     => 'fieldset-wide',
        ));

        if ($model->getId()) {
            $fieldset->addField('increment_id', 'hidden', array(
                'name' => 'increment_id',
            ));
        }

        $storeViews = $this->getStoreViewsArray();

        $fieldset->addField('store_view', 'select', array(
            'label'     => Mage::helper('checkout')->__('Store View'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'store_view',
            'value'  => '1',
            'values' => $storeViews,
            'disabled' => false,
            'readonly' => false,
            'after_element_html' => '<br/><br/>',
            'tabindex' => 1,
            'required'  => true,
        ));

        $fieldset->addField('address', 'text', array(
            'name'      => 'address',
            'label'     => Mage::helper('checkout')->__('Address'),
            'title'     => Mage::helper('checkout')->__('Address'),
            'required'  => true,
        ));
        $fieldset->addField('postcode', 'text', array(
            'name'      => 'postcode',
            'label'     => Mage::helper('checkout')->__('Postcode'),
            'title'     => Mage::helper('checkout')->__('Postcode'),
            'required'  => false,
        ));
        $fieldset->addField('city', 'text', array(
            'name'      => 'city',
            'label'     => Mage::helper('checkout')->__('City'),
            'title'     => Mage::helper('checkout')->__('City'),
            'required'  => false,
        ));
        $fieldset->addField('country', 'text', array(
            'name'      => 'country',
            'label'     => Mage::helper('checkout')->__('Country'),
            'title'     => Mage::helper('checkout')->__('Country'),
            'required'  => true,
            'after_element_html' => '<br/><br/>',
        ));

        $fieldset->addField('email', 'text', array(
            'name'      => 'email',
            'label'     => Mage::helper('checkout')->__('Email'),
            'title'     => Mage::helper('checkout')->__('Email'),
            'required'  => true,
        ));
        $fieldset->addField('phone', 'text', array(
            'name'      => 'phone',
            'label'     => Mage::helper('checkout')->__('Phone'),
            'title'     => Mage::helper('checkout')->__('Phone'),
            'required'  => true,
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}