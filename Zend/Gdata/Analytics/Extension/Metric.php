<?php
namespace Zend\GData\Analytics\Extension;

use Zend\GData\Analytics\Extension\Property;

/**
 * @category   Zend
 * @package    Zend_GData
 * @subpackage Analytics
 */
class Metric
    extends Property
{
    protected $_rootNamespace = 'ga';
    protected $_rootElement = 'metric';
    protected $_value = null;
    protected $_name = null;

    protected function takeAttributeFromDOM($attribute)
    {
        switch ($attribute->localName) {
            case 'name':
                $this->_name = $attribute->nodeValue;
                break;
            case 'value':
                $this->_value = $attribute->nodeValue;
                break;
            default:
                parent::takeAttributeFromDOM($attribute);
        }
    }
}
