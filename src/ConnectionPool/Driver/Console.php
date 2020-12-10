<?php
namespace YuK1\LaravelBrefWebsockets\ConnectionPool\Driver;

class Console implements DriverInterface
{
    public function onConnect(string $connectionId, string $apiId, string $region, string $stage, string $channel) {
        echo sprintf('onConnect : %s %s %s %s %s', $connectionId, $apiId, $region, $stage, $channel);
    }

    public function onDisconnect(string $connectionId) {
        echo sprintf('onDisconnect : %s', $connectionId);
    }
}