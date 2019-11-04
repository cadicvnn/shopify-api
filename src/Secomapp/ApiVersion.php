<?php

namespace Secomapp;

class ApiVersion
{
    const UNSTABLE_HANDLE = 'unstable';

    protected $handle;
    protected $displayName;
    protected $supported;
    protected $lastedSupported;
    protected $verified;

    public function __construct($handle, $displayName = null, $supported = false, $lastedSupported = false, $verified = false)
    {
        $this->handle = $handle;
        $this->displayName = $displayName;
        $this->supported = $supported;
        $this->lastedSupported = $lastedSupported;
        $this->verified = $verified;
    }

    public function __toString()
    {
        return $this->handle;
    }

    public function latestSupported()
    {
        return $this->lastedSupported;
    }

    public function supported()
    {
        return $this->supported;
    }

    public function verified()
    {
        return $this->verified;
    }

    public function unstable()
    {
        return $this->handle === self::UNSTABLE_HANDLE;
    }
}
