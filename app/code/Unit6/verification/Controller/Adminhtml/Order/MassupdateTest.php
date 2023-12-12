<?php

namespace Unit6\verification\Controller\Adminhtml\Order;

use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;

class MassupdateTest extends Action
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param Action\Context $context
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Action\Context $context,
        CollectionFactory $collectionFactory
    ) {
        parent::__construct($context);
        $this->collectionFactory = $collectionFactory;
    }

    public function execute()
    {
        $collection = $this->collectionFactory->create();
        $selected = $this->getRequest()->getParam('selected');

        if (!is_array($selected) || empty($selected)) {
            $this->messageManager->addError(__('Please select order(s).'));
        } else {
            try {
                foreach ($selected as $orderId) {
                    $order = $collection->getItemById($orderId);
                    if ($order) {
                        // Update require_verification to "0"
                        $order->setData('require_verification', 0);
                        $order->save();
                    }
                }

                $this->messageManager->addSuccess(__('Total of %1 record(s) have been updated.', count($selected)));
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }
        
        /** 
         * @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect 
         * */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('sales/order/index');
    }
}
