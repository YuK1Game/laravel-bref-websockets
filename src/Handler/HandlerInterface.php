<?php
namespace YuK1\LaravelBrefWebsockets\Handler;

use Bref\Event\ApiGateway\WebsocketEvent;

interface HandlerInterface
{
    public function __construct(WebsocketEvent $event);

    public function action() : void;
}