<?php 
  // main app core class
  // creates URL & loads core controller
  // URL formate - /controller/method/params

  class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      //print_r($this->getUrl());

      $url = $this->getUrl();

      // look in controllers for first val, path as index
      if(file_exists('../app/controllers/'. ucwords($url[0]). '.php')){
        // true >> set as controller
        $this->currentController = ucwords($url[0]);
        // unset [0]
        unset($url[0]);
      }
      // require controller
      require_once '../app/controllers/'. $this->currentController .'.php';
      // instantiate controller
      $this->currentController = new $this->currentController;
    }

    public function getUrl(){
      if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  }


?>