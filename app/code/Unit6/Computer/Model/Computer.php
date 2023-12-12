<?php
namespace Unit6\Computer\Model;
class Computer extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Unit6\Computer\Model\ResourceModel\Computer');
	}
}
