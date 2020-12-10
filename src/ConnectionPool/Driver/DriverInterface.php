<?php
namespace YuK1\LaravelBrefWebsockets\ConnectionPool\Driver;

interface DriverInterface
{
    public function onConnect(string $connectionId, string $apiId, string $region, string $stage, string $channel);

    public function onDisconnect(string $connectionId);
}