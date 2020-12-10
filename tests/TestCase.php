<?php

namespace YuK1\LaravelBrefWebsockets\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

use YuK1\LaravelBrefWebsockets\WebsocketsServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function setUp(): void {
        parent::setUp();

        putenv('WEBSOCKET_CONNECTION_POOL_DRIVER=console');
    }

    protected function getPackageProviders($app)
    {
        return [ WebsocketsServiceProvider::class ];
    }
    
}
