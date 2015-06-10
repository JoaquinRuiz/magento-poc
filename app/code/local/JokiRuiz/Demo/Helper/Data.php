<?php

class JokiRuiz_Demo_Helper_Data extends Mage_Core_Helper_Abstract {
    public function sayHi() {
        echo 'Hi';
    }

    public function beautifyPrice($price) {
        if (!isset($price))
            return 'unknown price';
        else
            return number_format($price,2,'.',',');
    }
}