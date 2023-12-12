<?php
namespace Unit6\Computer\Model\ResourceModel\Computer;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Unit6\Computer\Model\Computer', 'Unit6\Computer\Model\ResourceModel\Computer');
	}

}