<?php 
namespace Unit6\Ex\Ui\DataProvider\Product;
use Magento\Framework\Data\Collection;
use Magento\Ui\DataProvider\AddFilterToCollectionInterface; 
class AddMonthlyViewsFilterToGrid implements AddFilterToCollectionInterface
{
   
    public function addFilter(Collection $collection, $field, $condition = null)
    {
        if(isset($condition['gteq'])){
          $collection->addFieldToFilter([['attribute' => 'number_configurable', 'gteq' => $condition['gteq']]]);
        }
        if(isset($condition['lteq'])){
          $collection->addFieldToFilter([['attribute' => 'number_configurable', 'lteq' => $condition['lteq']]]);
        }
    }
}