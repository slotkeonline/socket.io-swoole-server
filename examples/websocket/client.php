<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

$client = new SocketIO\Engine\WebSocket\Client('127.0.0.1', 9991);

if (!$client->connect())
{
    echo "connect failed \n";
    return false;
}

$send_data = '2';
if (!$client->send($send_data))
{
    echo $send_data. " send failed \n";
    return false;
}

echo "send success \n";

echo $client->recv();

$send_data = '42["new message", 111]';
if (!$client->send($send_data))
{
    echo $send_data. " send failed \n";
    return false;
}

echo "send success \n";

echo $client->recv();