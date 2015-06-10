<?php

class JokiRuiz_Controller_IndexController extends Mage_Core_Controller_Front_Action
{
    public function sayHelloAction()
    {
        $this->loadLayout();

        $this->renderLayout();
    }

    public function indexAction()
    {
        echo 'welcome to my workl';
    }
}