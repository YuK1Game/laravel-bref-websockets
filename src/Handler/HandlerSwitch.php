<?php
namespace YuK1\LaravelBrefWebsockets\Handler;

use Bref\Event\ApiGateway\WebsocketEvent;
use Bref\Context\Context;
use Bref\Event\Http\HttpResponse;

class HandlerSwitch
{
    public static function factory(WebsocketEvent $event, ?Context $context = null) : HttpResponse {
        switch ($event->getEventType()) {
            case 'CONNECT' :
                (new ConnectHandler($event))->action();
                return new HttpResponse('connect');

            case 'DISCONNECT' :
                (new DisconnectHandler($event))->action();
                return new HttpResponse('disconnect');

            default :
                (new DefaultHandler($event))->action();
                return new HttpResponse('ok');
        }

        return new HttpResponse('Bad request', [], 400);
    }
}