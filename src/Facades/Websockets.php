<?php

namespace Yuk1\LaravelBrefWebsockets\Facades;

use Illuminate\Support\Facades\Facade;

class Websockets extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'websockets';
    }
}
