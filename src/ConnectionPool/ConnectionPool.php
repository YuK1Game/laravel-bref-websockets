<?php
namespace YuK1\LaravelBrefWebsockets\ConnectionPool;

use Illuminate\Support\Str;

class ConnectionPool implements ConnectionPoolInterface
{
    protected $driver;

    public function __construct() {
        $this->driver = config('websockets.driver');
    }

    public function createConnection() : Driver\DriverInterface {
        $className = __NAMESPACE__ . '\\Driver\\' . Str::studly($this->driver);
        return new $className();
    }
    
}