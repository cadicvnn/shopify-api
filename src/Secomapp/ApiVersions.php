<?php

namespace Secomapp;

use GuzzleHttp\Client as GuzzleClient;
use Exception;
use Secomapp\Exceptions\UnknownVersionException;

class ApiVersions
{
    // Hold the class instance.
    private static $instance = null;

    private $versions = array();
    private $allowUnknownVersion = true;

    // The constructor is private
    // to prevent initiation with outer code.
    private function __construct($allowUnknownVersion)
    {
        $this->allowUnknownVersion = $allowUnknownVersion;
    }

    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance($allowUnknownVersion = true)
    {
        if (self::$instance == null) {
            self::$instance = new ApiVersions($allowUnknownVersion);
        }

        return self::$instance;
    }

    public function fetchKnownVersions()
    {
        $client = new GuzzleClient();
        $response = $client->get("https://app.shopify.com/services/apis.json");

        $object = json_decode($response->getBody()->getContents());
        foreach ($object->apis as $api) {
            if ($api->handle === 'admin') {
                $this->versions = $api->versions;
                break;
            }
        }

        return $this->versions;
    }

    /**
     * @param ApiVersion|string $versionOrHandle
     * @return ApiVersion
     * @throws Exception
     */
    public function findVersion($versionOrHandle)
    {
        if (!$versionOrHandle) {
            throw new UnknownVersionException("Invalid version");
        }
        if ($versionOrHandle instanceof ApiVersion) {
            return $versionOrHandle;
        }

        foreach ($this->versions as $version) {
            if ($version->handle === $versionOrHandle) {
                return $version;
            }
        }

        if ($this->allowUnknownVersion) {
            $version = new ApiVersion($versionOrHandle);
            $this->addToKnownVersions($version);

            return $version;
        } else {
            throw new UnknownVersionException("Not allow unknown version. You must call fetchKnownVersions first");
        }
    }

    public function addToKnownVersions($version)
    {
        array_push($this->versions, $version);
    }
}
