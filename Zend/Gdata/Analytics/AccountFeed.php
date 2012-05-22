<?php
namespace Zend\GData\Analytics;

use Zend\GData\Feed;

/**
 * @category   Zend
 * @package    Zend_GData
 * @subpackage Analytics
 */
class AccountFeed extends Feed
{
    /**
     * The classname for individual feed elements.
     *
     * @var string
     */
    protected $_entryClassName = '\Zend\GData\Analytics\AccountEntry';

    /**
     * The classname for the feed.
     *
     * @var string
     */
    protected $_feedClassName = '\Zend\GData\Analytics\AccountFeed';

    /**
     * @see \Zend\GData\Feed::__construct()
     * @param null $element
     */
    public function __construct($element = null)
    {
        $this->registerAllNamespaces(\Zend\GData\Analytics::$namespaces);
        parent::__construct($element);
    }
}
