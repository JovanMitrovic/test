<?php


class route {

    // Default controller, method, params

    public $controller = "productController";
    public $method = "index";
    public $params = [];

    /////////////////////////////////////////////////////////////////////////////////////

    public function __construct()
    {
        $url = $this->url();
        
        if (isset($url))
        {
            if (file_exists("../app/controllers/" . $url[0] . ".php"))
            {
                $this->controller = $url[0];
                unset($url[0]);
            }
            else
            {
                die("controller not found");
            }
        }

        // Include controller
        require_once "../app/controllers/" . $this->controller . ".php";

        // Instantiate controller 
        $this->controller = new $this->controller;

        if (isset($url[1]) && isset($url[1]))
        {
            if (method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
            else
            {
                // echo "method " . $url[1] . " not found";
            }
        }

        if (isset($url))
        {
            $this->params = $url;
        }
        else
        {
            $this->params = [];
        }
        
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /////////////////////////////////////////////////////////////////////////////////////

    public function url()
    {
        if (isset($_GET['url']))
        {
            $url = $_GET['url'];
            $url = rtrim($url);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);

            return $url;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////
}

?>