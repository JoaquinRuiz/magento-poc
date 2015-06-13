<?php

class JokiRuiz_Stockists_Adminhtml_StockistsController extends Mage_Adminhtml_Controller_Action
{

    public function _initAction()
    {
        $this->_title($this->__('Stockists'));
        $this->loadLayout();

        $this->_setActiveMenu('stockists');

        return $this;
    }

    private function processStockists()
    {

    }

    public function indexAction()
    {
        $this->_initAction();

        $this->getLayout()
            ->getBlock('stockists_index_map')
            ->setData('title','Stockists map');

        $this->_addContent(
            $this->getLayout()->createBlock('jokiruiz_stockists/adminhtml_stockists')
        );

        $this->renderLayout();
    }

    public function editAction()
    {
        $this->_initAction();

        // Get id if available
        $id  = $this->getRequest()->getParam('id');
        $model = Mage::getModel('jokiruiz_stockists/stockists');

        if ($id) {
            // Load record
            $model->load($id);

            // Check if record is loaded
            if (!$model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('This stockist no longer exists.'));
                $this->_redirect('*/*/');

                return;
            }
        }

        $this->_title($model->getId() ? $model->getName() : $this->__('New stockist'));

        $data = Mage::getSingleton('adminhtml/session')->getStockistsData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register('jokiruiz_stockists', $model);

        $this->_initAction()
            ->_addBreadcrumb($id ? $this->__('Edit stockist') : $this->__('New stockist'), $id ? $this->__('Edit stockist') : $this->__('New stockist'))
            ->_addContent($this->getLayout()->createBlock('jokiruiz_stockists/adminhtml_stockists_edit')->setData('action', $this->getUrl('*/*/save')))
            ->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('jokiruiz_stockists/adminhtml_stockists_grid')->toHtml()
        );
    }

    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost()) {
            $model = Mage::getModel('jokiruiz_stockists/stockists');
            $model->setData($postData);

            try {
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The stockist has been saved.'));
                $this->_redirect('*/*/');

                return;
            }
            catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this stockist.'));
            }

            Mage::getSingleton('adminhtml/session')->setBazData($postData);
            $this->_redirectReferer();
        }
    }

    public function deleteAction()
    {
        if($this->getRequest()->getParam('id') > 0)
        {
            try
            {
                $testModel = Mage::getModel('jokiruiz_stockists/stockists');
                $testModel->setId($this->getRequest()
                    ->getParam('id'))
                    ->delete();
                Mage::getSingleton('adminhtml/session')
                    ->addSuccess('successfully deleted');
                $this->_redirect('*/*/');
            }
            catch (Exception $e)
            {
                Mage::getSingleton('adminhtml/session')
                    ->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }

}