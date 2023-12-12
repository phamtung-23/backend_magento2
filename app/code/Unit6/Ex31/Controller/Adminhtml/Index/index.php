<?php

namespace Unit6\Ex31\Controller\Adminhtml\Index;

class Index extends \Magento\Backend\App\Action {
    protected $resultPageFactory = false;
        public function __construct(
            \Magento\Backend\App\Action\Context $context,
            \Magento\Framework\View\Result\PageFactory $resultPageFactory
        )
        {
            parent::__construct($context);
            $this->resultPageFactory = $resultPageFactory;
        }
        public function execute()
        {
            $resultPage = $this->resultPageFactory->create();
            $resultPage->getConfig()->getTitle()->prepend((__('Hello World')));
            return $resultPage;
        }

        public function _isAllowed()
        {
            return $this->_authorization->isAllowed('Unit6_Ex31::hello');
        }
    }