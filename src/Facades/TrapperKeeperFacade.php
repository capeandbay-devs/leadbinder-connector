<?php

namespace CapeAndBay\LeadBinder\TrapperKeeper\Facades;

use Illuminate\Support\Facades\Facade;
use CapeAndBay\LeadBinder\TrapperKeeper\TrapperKeeper;

class TrapperKeeperFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return TrapperKeeper::class;
    }
}
