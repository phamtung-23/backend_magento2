<?php
namespace Unit6\Computer\Model;

use Magento\Framework\Option\ArrayInterface;
use Unit6\Computer\Model\ResourceModel\Computer\CollectionFactory;


class Options implements ArrayInterface
{
    protected $gameCollectionFactory;

    public function __construct(CollectionFactory $gameCollectionFactory)
    {
        $this->gameCollectionFactory = $gameCollectionFactory;
    }

    public function toOptionArray()
    {
        $options = [];
        $collection = $this->gameCollectionFactory->create();

        foreach ($collection as $item) {
            $options[] = [
                'value' => $item->getType(), 
                'label' => $item->getType(), 
            ];
        }

        return $options;
    }
}