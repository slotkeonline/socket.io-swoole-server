<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

try {

    $config = new SocketIO\Engine\Server\ConfigPayload();
    $config
        // server worker_num
        ->setWorkerNum(1)
        // server daemonize
        ->setDaemonize(0);

    $io = new SocketIO\Server(9991, $config);
    $io->on('new message', function (SocketIO\Server $socket) {
        $socket->emit('new message', [
            'data' => $socket->getMessage()
        ]);
    });

    $io->start();

} catch (Exception $e) {
    echo $e->getMessage();
    echo $e->getTraceAsString();
}