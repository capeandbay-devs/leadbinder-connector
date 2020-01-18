<?php

namespace CapeAndBay\LeadBinder\TrapperKeeper;

use CapeAndBay\LeadBinder\TrapperKeeper\Auth\AccessToken;

class TrapperKeeper
{
    protected $access_token;

    public function __construct(AccessToken $access_token)
    {
        $this->access_token = $access_token;
    }

    /**
     * Create a new TrapperKeeper instance.
     *
     * @param mixed $token
     * @return static
     */
    public static function create($token = null)
    {
        return static::make($token)->create();
    }

    /**
     * Create a TrapperKeeper factory instance.
     *
     * @param  mixed  $token
     * @return TrapperKeeperFactory
     */
    public static function make($token = null)
    {
        return new TrapperKeeperFactory($token);
    }

    /**
     * Login to the LeadBinder service via JWT.
     *
     * @param  string  $username
     * @param  string  $password
     * @return TrapperKeeper
     */
    public function login($username, $password)
    {
        $results = false;
        /**
         * Steps
         * 1. Login with the AccessToken class.
         * 2. Get User Info with the FrontSleeve Object
         * 3. Get Account Info with the FrontSleeve Object
         */
        $login_response = $this->access_token->login($username, $password);

        if($login_response === true)
        {
            session()->put('leadbinder-jwt-access-token', $this->access_token->token());
            session()->put('leadbinder-username', $username);
            $results = $this;
        }
        else
        {
            if($login_response)
            {
                $results = $login_response;
            }
        }

        return $results;
    }
}
