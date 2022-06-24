<?php


namespace String\SortApplication;


use String\SortApplication\Entities\AbstractClasses\RouterAbstract;
use String\SortApplication\Entities\Interfaces\RouterInterface;

class  Router extends RouterAbstract implements  RouterInterface
{
    protected $routes = array();

    public function get($path, $callback){
         $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

    public function back($data=[]){
        view('home',$data);
    }

    public function execute(){
        $path = $this->getPath();
        $method = $this->getRequestMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            http_response_code(404);
            return view('error-pages.404');
        }

        if (is_string($callback)) {
            return view($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        echo call_user_func($callback, $this->getRequestData());
    }
}
