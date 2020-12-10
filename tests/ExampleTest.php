<?php

namespace YuK1\LaravelBrefWebsockets\Tests;

use YuK1\LaravelBrefWebsockets\Handler\HandlerSwitch;
use Bref\Event\ApiGateway\WebsocketEvent;
use Bref\Event\Http\HttpResponse;

class ExampleTest extends TestCase
{
    public function test_connect_handler()
    {
        $event = new WebsocketEvent([
            'requestContext' => [
                'routeKey' => '$connect',
                'eventType' => 'CONNECT',
                'connectionId' => 'connectionId',
                'domainName' => 'localhost.ap-northeast-1.execute-api.amazon.com',
                'apiId' => 'apiId',
                'stage' => 'local',
            ],
            'queryStringParameters' => [
                'channel' => 'channel_name',
            ],
            'body' => json_encode([]),
            'isBase64encode' => false,
        ]);

        $this->assertInstanceOf(HttpResponse::class, HandlerSwitch::factory($event));
    }

    public function test_disconnect_handler() {
        $event = new WebsocketEvent([
            'requestContext' => [
                'routeKey' => '$disconnect',
                'eventType' => 'DISCONNECT',
                'connectionId' => 'connectionId',
                'domainName' => 'localhost.ap-northeast-1.execute-api.amazon.com',
                'apiId' => 'apiId',
                'stage' => 'local',
            ],
            'body' => json_encode([]),
            'isBase64encode' => false,
        ]);

        $this->assertInstanceOf(HttpResponse::class, HandlerSwitch::factory($event));
    }

    public function test_default_handler() {
        $event = new WebsocketEvent([
            'requestContext' => [
                'routeKey' => '$default',
                'eventType' => 'MESSAGE',
                'connectionId' => 'connectionId',
                'domainName' => 'localhost.ap-northeast-1.execute-api.amazon.com',
                'apiId' => 'apiId',
                'stage' => 'local',
            ],
            'body' => json_encode(['data' => 'Hello']),
            'isBase64encode' => false,
        ]);

        $this->assertInstanceOf(HttpResponse::class, HandlerSwitch::factory($event));
    }

}
