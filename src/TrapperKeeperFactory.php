<?php

namespace CapeAndBay\LeadBinder\TrapperKeeper;

use CapeAndBay\LeadBinder\TrapperKeeper\Auth\AccessToken;

class TrapperKeeperFactory
{
    /**
     * The Access Token to use.
     *
     * @var mixed
     */
    protected $access_token;

    /**
     * Create a new TrapperKeeperFactory instance.
     *
     * @param mixed  $token
     */
    public function __construct($token = null)
    {
        $this->access_token = $token;
    }

    /**
     * Create an instance of TrapperKeeper.
     *
     * @return TrapperKeeper
     */
    public function create()
    {
        $access_token = $this->getAccessToken();
        $keeper = new TrapperKeeper($access_token);

        return $keeper;
    }

    /**
     * Get an instance of the AccessToken.
     *
     * @return AccessToken
     */
    protected function getAccessToken()
    {
        return new AccessToken($this->access_token);
    }
}
