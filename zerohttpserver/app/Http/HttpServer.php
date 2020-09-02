<?php 

namespace App\Http;

use Amp\Loop;
use Amp\Socket;
use Monolog\Logger;
use Amp\Http\Status;
use Amp\Log\StreamHandler;
use Amp\Http\Server\Router;
use Amp\Http\Server\Server;
use Amp\Http\Server\Request;
use Amp\Http\Server\Response;
use Amp\Log\ConsoleFormatter;
use Amp\ByteStream\ResourceOutputStream;
use Amp\Http\Server\RequestHandler\CallableRequestHandler;

class HttpServer{

    public function startServer(){

        Loop::run(function () {
            $servers = [
                Socket\listen("0.0.0.0:1337"),
                Socket\listen("[::]:1337"),
            ];
        
            $logHandler = new StreamHandler(new ResourceOutputStream(\STDOUT));
            $logHandler->setFormatter(new ConsoleFormatter);
            $logger = new Logger('server');
            $logger->pushHandler($logHandler);
        
            $router = new HttpRoutes();
        
            $server = new Server($servers, $router->getRouter(), $logger);
            yield $server->start();
        
            
        });

    }

}