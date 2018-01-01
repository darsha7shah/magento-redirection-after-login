<?php

class YBizz_PriceChange_Model_Observer {

    public function homepagechk($observer) {

        $routeName = Mage::app()->getRequest()->getRouteName();
        $identifier = Mage::getSingleton('cms/page')->getIdentifier();
        $code = Mage::app()->getStore()->getCode();

        if ($code == "wholesale" && $routeName == 'cms' && $identifier == 'home') {
            if (!Mage::getSingleton('customer/session')->isLoggedIn()) {
                Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account/login'));
            }
        }
    }

    public function homeRedirect(Varien_Event_Observer $observer) {
        $code = Mage::app()->getStore()->getCode();
        if ($code == "wholesale") {
            Mage::app()->getResponse()->setRedirect(Mage::getUrl());
        }
    }

}
