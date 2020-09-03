<?php
namespace App\Http;

use Amp\Http\Status;
use Amp\Http\Server\Router;
use Amp\Http\Server\Request;
use Amp\Http\Server\Response;
use Amp\Http\Server\RequestHandler\CallableRequestHandler;
use App\Controllers\exampleController;
use App\Controllers\ProductController;

class HttpRoutes extends HttpRouter{

  
    /**
     * Constructor class
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Define the routes of the http server
     *
     * @return void
     */
    public function routes(){


        $this->router->addRoute('GET', '/', new CallableRequestHandler(function () {
            return new Response(Status::FORBIDDEN, ['content-type' => 'text/plain'],null);
        }));

        $this->router->addRoute('GET','/product/{idproduct}',new CallableRequestHandler(function(Request $request){
            $args = $request->getAttribute(Router::class);
            return (new ProductController())->getproduct($args['idproduct']);
        }));

        $this->router->addRoute('GET','/example/product/{idproduct}',new CallableRequestHandler(function(Request $request){
            $args = $request->getAttribute(Router::class);
            return (new exampleController())->getproduct($args['idproduct']);
        }));

        $this->router->addRoute('GET', '/{name}', new CallableRequestHandler(function (Request $request) {
            $args = $request->getAttribute(Router::class);
            return new Response(Status::OK, ['content-type' => 'text/plain'], "Hello, {$args['name']}!");
        }));

    }


}