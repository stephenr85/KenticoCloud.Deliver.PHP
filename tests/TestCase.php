<?php
namespace KenticoCloud\Deliver\Test;
require_once('_init.php');

use \PHPUnit\Framework\TestCase as UnitTestCase;

class TestCase extends UnitTestCase
{
    public function getClient()
    {
        $client = new \KenticoCloud\Deliver\Client(TEST_DELIVER_PROJECT_ID, TEST_DELIVER_API_KEY);
        return $client;
    }
}