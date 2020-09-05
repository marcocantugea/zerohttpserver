# Zerohttpserver - HTTP Server with laravel-zero

This proyect combines the powerfull framework laravel-zero and amphp-httserver to crear a web server for REST APIs creations.

# Project used
 - [Laravel-zero](https://laravel-zero.com/)
 - [AMP](https://amphp.org/http-server/)

# Starting the server

To star the server use the command

```cmd
php zerohttpserver start
```

# Defining Routes

To define a route, you can edit the file **App\Http\HttRoutes.php** and add the necesaring routes.

Example
```php
  
  $this->router->addRoute('GET', '/', new CallableRequestHandler(function () {
      return new Response(Status::FORBIDDEN, ['content-type' => 'text/plain'],null);
   }));
   
```

Http server with laravel zero and amphp libraries to create a REST api


# Controllers

You can use controllers for process the request. the controllers are defined in **App\Controllers**, this controllers use a base abstract class called **controller**

Example of controler.

```php
<?php

namespace App\Controllers;

use Amp\Http\Status;
use App\Controllers\base\Controller;

class exampleController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

  
    public function getproduct(string $idproduct){
        
        if($idproduct=="5875221455"){
            
            $product= ["id"=>"5875221455", "productName"=>"Bocina bluethooth", "price"=>485.547];
            $this->setHeader("content-type","application/json");
            $this->setContent(json_encode($product));
        }else{
            $this->setHttpStatusresponse(Status::FORBIDDEN);
            $this->setContent(null);
        }
        return $this->render();
    }
}
```
Defined route on the file HttpRoutes.php

```php
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


        //Example using a controller
        $this->router->addRoute('GET','/example/product/{idproduct}',new CallableRequestHandler(function(Request $request){
            $args = $request->getAttribute(Router::class);
            return (new exampleController())->getproduct($args['idproduct']);
        }));

    }


}
```

For more details use the repository for [laravel zero](https://github.com/laravel-zero/laravel-zero) and the [AMP](https://github.com/amphp/http-server) repository
