<?php
/**
 * Magiccart 
 * @category    Magiccart 
 * @copyright   Copyright (c) 2014 Magiccart (http://www.magiccart.net/) 
 * @license     http://www.magiccart.net/license-agreement.html
 * @Author: DOng NGuyen<nguyen@dvn.com>
 * @@Create Date: 2016-01-05 10:40:51
 * @@Modify Date: 2020-05-19 18:29:13
 * @@Function:
 */

namespace Magiccart\Magicproduct\Controller\Index;

use Magento\Framework\Controller\ResultFactory; 

class Product extends \Magiccart\Magicproduct\Controller\Index
{
    /**
     * Default customer account page.
     */
    public function execute()
    {
    	if ($this->getRequest()->isAjax()) {
	        $this->_view->loadLayout();
	        // $this->_view->renderLayout();
	        $info = $this->getRequest()->getParam('info');
	        $type = $this->getRequest()->getParam('type');
	        // $tmp = $info['timer'] ? 'product/gridtimer.phtml':'product/grid.phtml';
	        // $products = $this->_view->getLayout()->createBlock('Magiccart\Magicproduct\Block\Product\GridProduct')
					    //         ->setCfg($info)
					    //        	->setActivated($type)
					    //        	->setTemplate($tmp)
					    //        	->toHtml();
	        // $this->getResponse()->setBody( $products );
	        $block = $info['timer'] ? 'GridProduct.timer':'GridProduct';
		 	$response = $this->_view->getLayout()->getBlock($block);
		 	if($response) $response = $response->setCfg($info)->setActivated($type)->toHtml();
		    $this->getResponse()->setBody($response);
	    }else {
	        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
	        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
	        return $resultRedirect;
	    }
    }
}
