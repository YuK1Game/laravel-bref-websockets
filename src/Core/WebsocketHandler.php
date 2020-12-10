<?php
namespace YuK1\LaravelBrefWebsockets\Core;

use Bref\Context\Context;
use Bref\Event\ApiGateway\WebsocketEvent;
use Bref\Event\ApiGateway\WebsocketHandler as BrefWebsocketHandler;
use Bref\Event\Http\HttpResponse;

class WebsocketHandler extends BrefWebsocketHandler
{
    public function handleWebsocket(WebsocketEvent $event, Context $context) : HttpResponse {
        return HandlerSwitch::factory($event, $context);
    }
}