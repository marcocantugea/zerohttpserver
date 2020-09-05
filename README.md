# Zerohttpserver - HTTP Server with laravel-zero

His example combines the powerfull framework laravel-zero and amphp-httserver to crear a web server to create a REST API.

# Defining Routes

To define a route, you can edit the file **App\Http\HttRoutes.php** and add the necesaring routes.

Example
```php
  //Example diferent status
  $this->router->addRoute('GET', '/', new CallableRequestHandler(function () {
      return new Response(Status::FORBIDDEN, ['content-type' => 'text/plain'],null);
   }));
```

Http server with laravel zero and amphp libraries to create a REST api


# Controllers

You can use controllers for process the request. the controllers are defined in **App\Controllers**, this controllers use a base abstract class called **controller**
