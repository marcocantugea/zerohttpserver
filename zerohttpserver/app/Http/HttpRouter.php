<?php
namespace App\Http;

use Amp\Http\Status;
use Amp\Http\Server\Router;
use Amp\Http\Server\Request;
use Amp\Http\Server\Response;
use Amp\Http\Server\RequestHandler\CallableRequestHandler;

class HttpRouter{

    /**
     * Variable to store the routes
     *
     * @var Router
     */
    protected $router; 

    /**
     * Constructor class
     */
    public function __construct()
    {
        $this->router = new Router;
        $this->routes();
    }

    /**
     * Define the routes of the http server
     *  override method
     *
     * @return void
     */
    public function routes(){

    }

    public function getRouter(){
        return $this->router;
    }


}