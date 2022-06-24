<?php


namespace String\SortApplication;


class Application
{
    public  $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run(){
       echo $this->router->execute();
    }
}
