<?php
namespace Zend\GData\Analytics\Extension;

use Zend\GData\Extension;

/**
 * @category   Zend
 * @package    Zend_GData
 * @subpackage Analytics
 */
class Property extends Extension
{
    protected $_rootNamespace = 'ga';
    protected $_rootElement = 'property';
    protected $_value = null;
    protected $_name = null;

    /**
     * Constructs a new \Zend\GData\Analytics\Extensio\Property object.
     *
     * @param string $value (optional) The text content of the element.
     * @param null $name
     */
    public function __construct($value = null, $name = null)
    {
        $this->registerAllNamespaces(\Zend\GData\Analytics::$namespaces);
        parent::__construct();
        $this->_value = $value;
        $this->_name = $name;
    }

    /**
     * Given a DOMNode representing an attribute, tries to map the data into
     * instance members.  If no mapping is defined, the name and value are
     * stored in an array.
     *
     * @param DOMNode $attribute The DOMNode attribute needed to be handled
     *
     * @return null
     */
    protected function takeAttributeFromDOM($attribute)
    {
        switch ($attribute->localName) {
            case 'name':
                $this->_name = substr($attribute->nodeValue, 3);
                break;
            case 'value':
                $this->_value = $attribute->nodeValue;
                break;
            default:
                parent::takeAttributeFromDOM($attribute);
        }
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
     * @return \Zend\GData\Analytics\Extension\Property The element being modified.
     */
    public function setValue($value)
    {
        $this->_value = $value;
        return $this;
    }

    /**
     * @param string $name
     *
     * @return \Zend\GData\Analytics\Extension\Property
     */
    public function setName($name)
    {
        $this->_name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
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
