<?php

/*
 * You can place your custom package configuration in here.
 */
return [

    'driver' => env('WEBSOCKET_CONNECTION_POOL_DRIVER', 'dynamodb'),

    'connections' => [

        'dynamodb' => [
            'table_name' => env('DYNAMODB_WEBSOCKET_TABLE', 'websocketConnectionPool'),
        ],

        'console' => [
            
        ],
        
    ],

];