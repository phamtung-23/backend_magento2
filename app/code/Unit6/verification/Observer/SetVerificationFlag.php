<?php

namespace Unit6\verification\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Sales\Api\Data\OrderInterface;

class SetVerificationFlag implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        /** @var OrderInterface $order */
        $order = $observer->getEvent()->getOrder();

        // Set require_verification to "1"
        $order->setData('require_verification', 1);

        return $this;
    }
}
