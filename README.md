# \Zend\GData\Analytics

An additonal \Zend\GData component to query data from Analytics.

## Example

    $client = \Zend\GData\ClientLogin::getHttpClient($email, $password, \Zend\GData\Analytics::AUTH_SERVICE_NAME);
    $service = new \Zend\GData\Analytics($client);

    $query = $service->newDataQuery()
      ->setProfileId($yourID)
      ->addMetric(\Zend\GData\Analytics\DataQuery::METRIC_VISITS)
      ->addDimension(\Zend\GData\Analytics\DataQuery::DIMENSION_KEYWORD)
      ->addSort(\Zend\GData\Analytics\DataQuery::METRIC_VISITS, true)
      ->setStartDate('2006-01-01') 
      ->setEndDate('2011-07-13')
      ->setMaxResults(10000); 

    $result = $service->getDataFeed($query); 

    foreach($result as $row){
      /** … **/
    }
    
More on the [blog](http://healthycod.in/2011/07/google-analytics-and-zend-framework).