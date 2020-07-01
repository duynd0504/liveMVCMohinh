<?php 
    class App{
        // khai báo biến
        protected $controller ="Home"; 
        protected $action="SayHi"; 
        protected $params =[];
        
        function __construct ()
        {
           $arr = $this->UrlProcess(); 
           //Xử lý Controller 
            if(file_exists("mvc/controllers/".$arr[0].".php")){
                $this->controller = $arr[0];
            }
            require_once "mvc/controllers/".$this->controller.".php";
            //Xử lý Action 
            if(isset($arr[1])){
                if(method_exists("$this->controller", $arr[1])){
                    $this->action = $arr[1];
                }
            }
            echo $this->action;
            //Xử lý params
            
        }
        function UrlProcess(){
            if( isset($_GET["url"]) ){
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }

    }
?>