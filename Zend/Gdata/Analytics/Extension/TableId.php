<?php
namespace Zend\GData\Analytics\Extension;

use Zend\GData\Extension;
/**
 * @category   Zend
 * @package    Zend_GData
 * @subpackage Analytics
 */
class TableId extends Extension
{

    protected $_rootNamespace = 'ga';
    protected $_rootElement = 'tableId';
    protected $_value = null;

    /**
     * Constructs a new Zend\GData\Analytics\Extension\TableId object.
     * @param string $value (optional) The text content of the element.
     */
    public function __construct($value = null)
    {
        $this->registerAllNamespaces(\Zend\GData\Analytics::$namespaces);
        parent::__construct();
        $this->_value = $value;
    }

    /**
     * Retrieves a DOMElement which corresponds to this element and all
     * child properties.  This is used to build an entry back into a DOM
     * and eventually XML text for sending to the server upon updates, or
     * for application storage/persistence.
     *
     * @param DOMDocument $doc The DOMDocument used to construct DOMElements
     * @param int $majorVersion
     * @param null $minorVersion
     *
     * @return DOMElement The DOMElement representing this element and all
     * child properties.
     */
    public function getDOM($doc = null, $majorVersion = 1, $minorVersion = null)
    {
        $element = parent::getDOM($doc, $majorVersion, $minorVersion);
        if ($this->_value != null) {
            $element->setAttribute('value', $this->_value);
        }
        return $element;
    }

    /**
     * Given a DOMNode representing an attribute, tries to map the data into
     * instance members.  If no mapping is defined, the name and value are
     * stored in an array.
     *
     * @param \Zend\GData\App\DOMNode $child The DOMNode attribute needed to be handled
     *
     * @return null
     */
    protected function takeChildFromDOM($child)
    {
       $this->_value = $child->nodeValue;
    }

    /**
     * Get the value for this element's value attribute.
     *
     * @return string The value associated with this attribute.
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * Set the value for this element's value attribute.
     *
     * @param string $value The desired value for this attribute.
     *
     * @return \Zend\GData\Analytics\Extension\TableId The element being modified.
     */
    public function setValue($value)
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * Magic toString method allows using this directly via echo
     * Works best in PHP >= 4.2.0
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
