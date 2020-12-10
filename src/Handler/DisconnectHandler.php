<?php
namespace YuK1\LaravelBrefWebsockets\Handler;

class DisconnectHandler extends Handler
{
    public function action() : void {
        $connectionId = $this->event->getConnectionId();
        $this->connectionPool->onDisconnect($connectionId);
    }
}