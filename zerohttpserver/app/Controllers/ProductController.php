<?php

namespace App\Controllers;

use Amp\Http\Status;
use App\Controllers\base\Controller;

class ProductController extends Controller
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
