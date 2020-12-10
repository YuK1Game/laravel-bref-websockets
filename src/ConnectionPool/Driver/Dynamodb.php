<?php
namespace YuK1\LaravelBrefWebsockets\ConnectionPool\Driver;

use AsyncAws\DynamoDb\DynamoDbClient;
use AsyncAws\DynamoDb\Input\PutItemInput;
use AsyncAws\DynamoDb\ValueObject\AttributeValue;

class Dynamodb implements DriverInterface
{
    protected $client;

    protected $tableName;

    public function __construct() {
        $this->client = new DynamoDbClient();
        $this->tableName = config('websockets.connections.dynamodb.table_name');
    }

    public function onConnect(string $connectionId, string $apiId, string $region, string $stage, string $channel) {
        $item = new PutItemInput([
            'TableName' => $this->tableName,
            'Item' => [
                'connectionId' => new AttributeValue([ 'S' => $connectionId ]),
                'apiId' => new AttributeValue([ 'S' => $apiId ]),
                'region' => new AttributeValue([ 'S' => $region ]),
                'stage' => new AttributeValue([ 'S' => $stage ]),
                'channel' => new AttributeValue([ 'S' => $channel ]),
            ],
        ]);
        $this->client->putItem($item);
    }

    public function onDisconnect(string $connectionId) {
        $config = [
            'TableName' => $this->tableName,
            'Key' => [
                'connectionId' => [
                    'S' => $connectionId,
                ],
            ]
        ];
        $this->client->deleteItem($config);
    }

}