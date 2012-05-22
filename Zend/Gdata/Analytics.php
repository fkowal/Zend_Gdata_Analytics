<?php
namespace Zend\GData;

/**
 * @category   Zend
 * @package    Zend_GData
 * @subpackage Analytics
 */
class Analytics extends GData
{

    const AUTH_SERVICE_NAME = 'analytics';
    const ANALYTICS_FEED_URI = 'https://www.google.com/analytics/feeds';
    const ANALYTICS_ACCOUNT_FEED_URI = 'https://www.google.com/analytics/feeds/accounts';

    public static $namespaces = array(
        array('ga', 'http://schemas.google.com/analytics/2009', 1, 0)
    );

    /**
     * Create \Zend\GData\Analytics object
     *
     * @param \Zend\Http\Client $client (optional) The HTTP client to use when
     *          when communicating with the Google Apps servers.
     * @param string $applicationId The identity of the app in the form of Company-AppName-Version
     */
    public function __construct($client = null, $applicationId = 'MyCompany-MyApp-1.0')
    {
        $this->registerPackage('\Zend\GData\Analytics');
        $this->registerPackage('\Zend\GData\Analytics\Extension');
        parent::__construct($client, $applicationId);
        $this->_httpClient->setParameterPost(array('service' => self::AUTH_SERVICE_NAME));
    }

    /**
     * Retrieve account feed object
     *
     * @return \Zend\GData\Analytics\AccountFeed
     */
    public function getAccountFeed()
    {
        $uri = self::ANALYTICS_ACCOUNT_FEED_URI . '/default?prettyprint=true';
        return parent::getFeed($uri, '\Zend\GData\Analytics\AccountFeed');
    }

    /**
     * Retrieve data feed object
     *
     * @param mixed $location
     * @return \Zend\GData\Analytics\DataFeed
     */
    public function getDataFeed($location)
    {
        if ($location == null) {
            $uri = self::ANALYTICS_FEED_URI;
        } elseif ($location instanceof \Zend\GData\Query) {
            $uri = $location->getQueryUrl();
        } else {
            $uri = $location;
        }
        return parent::getFeed($uri, '\Zend\GData\Analytics\DataFeed');
    }

    /**
     * Returns a new DataQuery object.
     *
     * @param null $profileId
     *
     * @return \Zend\GData\Analytics\DataQuery
     */
    public function newDataQuery($profileId = null)
    {
        return new \Zend\GData\Analytics\DataQuery($profileId);
    }
}
