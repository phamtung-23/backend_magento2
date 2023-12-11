<?php 
namespace Unit6\Ex\Ui\DataProvider\Product;
use Magento\Framework\Data\Collection;
use Magento\Ui\DataProvider\AddFieldToCollectionInterface;
class MonthlyViewsFieldToCollection implements AddFieldToCollectionInterface
{
   
    public function addField(Collection $collection, $field, $alias = null)
    {
        $collection->joinField(
            'number_configurable',
            'catalog_product_entity',
            'config_numbers',
            'entity_id=entity_id',
            null,
            'left'
        );
    }
}