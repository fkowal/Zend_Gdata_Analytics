<?php
namespace Zend\GData\Analytics;

use Zend\GData\Entry;

/**
 * @category   Zend
 * @package    Zend\GData
 * @subpackage Analytics
 */
class DataEntry extends Entry
{
    /**
     * @var array
     */
    protected $_dimensions = array();
    /**
     * @var array
     */
    protected $_metrics = array();

    /**
     * @param DOMElement $element
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
            case $this->lookupNamespace('ga') . ':' . 'dimension';
                $dimension = new \Zend\GData\Analytics\Extension\Dimension();
                $dimension->transferFromDOM($child);
                $this->_dimensions[] = $dimension;
                break;
            case $this->lookupNamespace('ga') . ':' . 'metric';
                $metric = new \Zend\GData\Analytics\Extension\Metric();
                $metric->transferFromDOM($child);
                $this->_metrics[] = $metric;
                break;
            default:
                parent::takeChildFromDOM($child);
                break;
        }
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getDimension($name)
    {
        foreach ($this->_dimensions as $dimension) {
            if ($dimension->getName() == $name) {
                return $dimension;
            }
        }
        return null;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getMetric($name)
    {
        foreach ($this->_metrics as $metric) {
            if ($metric->getName() == $name) {
                return $metric;
            }
        }
        return null;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getValue($name)
    {
        if (null !== ($metric = $this->getMetric($name))) {
            return $metric;
        }
        return $this->getDimension($name);
    }
}
