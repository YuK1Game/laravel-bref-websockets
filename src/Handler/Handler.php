<?php
namespace YuK1\LaravelBrefWebsockets\Handler;

use Bref\Event\ApiGateway\WebsocketEvent;

use YuK1\LaravelBrefWebsockets\ConnectionPool\ConnectionPool;

abstract class Handler implements HandlerInterface
{
    protected $event;

    protected $connectionPool;

    public function __construct(WebsocketEvent $event) {
        $this->event = $event;
        $this->connectionPool = app(ConnectionPool::class)->createConnection();
    }
}