<?php

namespace CapeAndBay\LeadBinder\TrapperKeeper;

use Illuminate\Support\ServiceProvider;

class TrapperKeeperServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerTrapperKeeper();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->runningInConsole()) {

        }
    }

    /**
     * Register TrapperKeeper as a singleton.
     *
     * @return void
     */
    protected function registerTrapperKeeper()
    {
        $this->app->singleton(TrapperKeeper::class, function () {
            $token = null;
            if(session()->has('leadbinder-jwt-access-token'))
            {
                $token = session()->get('leadbinder-jwt-access-token');
            }
            return TrapperKeeper::make($token)
                ->create();
        });
    }

    /**
     * Determine if we are running in the console.
     *
     * Copied from Laravel's Application class, since we need to support 6.x.
     *
     * @return bool
     */
    protected function runningInConsole()
    {
        return php_sapi_name() == 'cli' || php_sapi_name() == 'phpdbg';
    }
}
