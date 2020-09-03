<?php

namespace App\Controllers\base;

use Amp\Http\Status;
use Amp\Http\Server\Request;
use Amp\Http\Server\Response;

abstract class Controller {

    /** @var Request $resquest get from the http service. */
    protected $request = null;

    /** @var mixed $args request args from URI */
    protected $args = null;

    /** @var Status $HttpStatusResponse http status response for the request */
    protected $HttpStatusresponse =Status::OK;

    /** @var array $headers headers for the response request */
    protected $headers = array();

    /** @var string $content content of the http response */
    protected $content = "Hello, here!";

    /**
     * Class constructor.
     */
    protected function __construct(Request $request=null, $args=null)
    {
        $this->request=$request;
        $this->args=$args;
        $this->header['content-type']='text/plain';
    }

    /**
     * render view o response for the http server
     *
     * @return void
     */
    public function render()
    {
        return new Response($this->HttpStatusresponse,$this->header, $this->content);
    }
   
    /**
     * Override function
     *
     * @return void
     */
    public function Page(){
        
    }

    /**
     * Get the value of args
     */ 
    protected function getArgs()
    {
        return $this->args;
    }

    /**
     * Set the value of args
     *
     * @return  self
     */ 
    protected function setArgs($args)
    {
        $this->args = $args;

        return $this;
    }

    /**
     * Get the value of headers
     */ 
    protected function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set the value of headers
     *
     * @return  self
     */ 
    protected function setHeaders($headers)
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * Get header 
     *
     * @param string $headerkey
     * @return mixed|string
     */
    protected function getHeader(string $headerkey)
    {
        return $this->header[$headerkey];

    }

    /**
     * set a header item
     *
     * @param string $headerkey
     * @param string $headervalue
     * @return self
     */
    protected function setHeader(string $headerkey,string $headervalue)
    {
        $this->header[$headerkey]=$headervalue;

        return $this;
    }


    /**
     * Get the value of content
     */ 
    protected function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    protected function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of HttpStatusresponse
     */ 
    public function getHttpStatusresponse()
    {
        return $this->HttpStatusresponse;
    }

    /**
     * Set the value of HttpStatusresponse
     *
     * @return  self
     */ 
    public function setHttpStatusresponse($HttpStatusresponse)
    {
        $this->HttpStatusresponse = $HttpStatusresponse;

        return $this;
    }
}