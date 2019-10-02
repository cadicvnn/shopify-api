<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Secomapp\ApiVersions;

class ApiVersionTest extends TestCase
{
    public function testFetchKnownVersions()
    {
        $versions = ApiVersions::getInstance()->fetchKnownVersions();
        $this->assertNotEmpty($versions);
    }
}
