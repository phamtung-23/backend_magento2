<?php

namespace Unit6\Ex31\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Text extends Field
{
    /**
     * Render element value in form.
     *
     * @param  AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $this->setElement($element);
        $value = $element->getValue();
        $text = $value == '1' ? __('Hello World') : '';
        $element->setComment($text);

        return parent::_getElementHtml($element);
    }
}
