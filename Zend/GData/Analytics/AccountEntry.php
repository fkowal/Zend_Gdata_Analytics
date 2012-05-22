<?php
namespace Zend\GData\Analytics;

use Zend\GData\Entry;

/**
 * @category   Zend
 * @package    Zend_GData
 * @subpackage Analytics
 */
class AccountEntry extends Entry
{
    protected $_accountId;
    protected $_accountName;
    protected $_profileId;
    protected $_webPropertyId;
    protected $_currency;
    protected $_timezone;
    protected $_tableId;

    /**
     * @see \Zend\GData\Entry::__construct()
     *
     * @param null $element
     */
    public function __construct($element = null)
    {
        $this->registerAllNamespaces(\Zend\GData\Analytics::$namespaces);
        parent::__construct($element);
    }

    /**
     * @param DOMElement $child
     *
     * @return void
     */
    protected function takeChildFromDOM($child)
    {
        $absoluteNodeName = $child->namespaceURI . ':' . $child->localName;
        switch ($absoluteNodeName) {
            case $this->lookupNamespace('ga') . ':' . 'property';
                $property = new \Zend\GData\Analytics\Extension\Property();
                $property->transferFromDOM($child);
                $this->{$property->getName()} = $property;
                break;
            case $this->lookupNamespace('ga') . ':' . 'tableId';
                $tableId = new \Zend\GData\Analytics\Extension\TableId();
                $tableId->transferFromDOM($child);
                $this->_tableId = $tableId;
                break;
            default:
                parent::takeChildFromDOM($child);
                break;
        }
    }
}
