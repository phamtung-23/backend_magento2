<?php

namespace Unit6\verification\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Quote\Model\Quote\Interceptor as QuoteInterceptor;

class SetVerificationFlag implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        /** @var OrderInterface $order */
        $order = $observer->getEvent()->getOrder();

        // Check if the order is placed in the Admin
        if ($this->isAdminOrder($order)) {
            // Set require_verification to "0"
            $order->setData('require_verification', 0);
        } else {
            // Set require_verification to "1"
            $order->setData('require_verification', 1);
        }

        return $this;
    }

    /**
     * Check if the order is placed in the Admin
     *
     * @param OrderInterface $order
     * @return bool
     */
    private function isAdminOrder(OrderInterface $order)
    {
        $quote = $order->getQuote();

        if ($quote instanceof QuoteInterceptor) {
            // Check if the quote was created in the Admin
            return $quote->getStoreId() === 0;
        }

        return false;
    }
}