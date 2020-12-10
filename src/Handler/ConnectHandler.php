<?php
namespace YuK1\LaravelBrefWebsockets\Handler;

class ConnectHandler extends Handler
{
    public function action() : void {
        $connectionId = $this->event->getConnectionId();
        $apiId = $this->event->getApiId();
        $region = $this->event->getRegion();
        $stage = $this->event->getConnectionId();
        $channel = $this->getChannelName();

        $this->connectionPool->onConnect($connectionId, $apiId, $region, $stage, $channel);
    }

    public function getChannelName() : string {
        return $this->event->toArray()['queryStringParameters']['channel'] ?? 'default';
    }

}