<?php
namespace Zend\GData\Analytics\Extension;

use Zend\GData\Analytics\Extension\Metric;

/**
 * @category   Zend
 * @package    Zend_GData
 * @subpackage Analytics
 */
class Dimension
    extends Metric
{
    protected $_rootNamespace = 'ga';
    protected $_rootElement = 'dimension';
    protected $_value = null;
    protected $_name = null;
}
