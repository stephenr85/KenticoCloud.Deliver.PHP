<?php
namespace KenticoCloud\Deliver\Test;
require_once('_init.php');

class ClientTest extends \KenticoCloud\Deliver\Test\TestCase
{

    public function testGetTypes(){
        $client = $this->getClient();
        $results = $client->getTypes(array());
        $this->assertTrue(!$results->error_code && is_object($results->pagination));
    }

    public function testGetTaxonomies(){
        $client = $this->getClient();
        $results = $client->getTaxonomies(array());
        
        $this->assertTrue(!$results->error_code && is_object($results->pagination));
    }

    public function testGetItems()
    {
        $client = $this->getClient();
        $results = $client->getItems(array('limit' => 5));

        $this->assertTrue(!$results->error_code && is_object($results->pagination));
    }

}