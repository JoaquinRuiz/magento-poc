<?php

class JokiRuiz_Demo_IndexController extends Mage_Core_Controller_Front_Action
{
    public function miscoAction()
    {
        $this->loadLayout();

        $this->renderLayout();
    }

    public function indexAction()
    {
        echo 'welcome to my workl';
    }
}