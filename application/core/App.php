<?php

namespace Application\core;

class App
{
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $page404 = false;
    protected $params = [];

    public function __construct()
    {
        $URL_ARRAY = $this->parseUrl();
        $this->getControllerFromUrl($URL_ARRAY);
        $this->getMethodFromUrl($URL_ARRAY);
        $this->getParamsFromUrl($URL_ARRAY);
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
    public function parseUrl(){
    
        $rawRequestUri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
        if ($rawRequestUri === null) {
            $rawRequestUri = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null;
        }
        if ($rawRequestUri === null) {
            die('Falha ao recuperar REQUEST_URI ou PATH_INFO');
        }
        $urlSegments = explode('/', substr($rawRequestUri, 1));
        if (!is_array($urlSegments)) {
            die('Falha ao analisar o URL');
        }
        return $urlSegments;
    }
    public function getControllerFromUrl($url){
    if(!empty($url[0]) && isset($url[0])){
    if(file_exists('../Application/controllers/'
    .ucfirst($url[0]). 'Controller.php') ){
    $this->controller = ucfirst($url[0]).'Controller';
    }else{
    $this->page404 = true;
        }
    }
    require_once '../Application/controllers/'.$this->controller . '.php';
    $this->controller = new $this->controller();
    }
    private function getMethodFromUrl($url){
    if(!empty($url[1]) && isset($url[1])){
    if(method_exists($this->controller, $url[1]) && !$this->page404)    {
        $this->method = $url[1];
    }else{
    $this->method = 'pageNotFound';
            }
        }
    }
    private function getParamsFromUrl($url){
        if(count($url) > 2){
            $this->params = array_slice($url, 2);
        }
    } // fim Class
}