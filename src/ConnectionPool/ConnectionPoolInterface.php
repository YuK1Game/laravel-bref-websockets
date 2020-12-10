<?php
namespace YuK1\LaravelBrefWebsockets\ConnectionPool;

interface ConnectionPoolInterface
{
    public function createConnection() : Driver\DriverInterface;
}