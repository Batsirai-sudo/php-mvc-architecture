<?php


namespace String\SortApplication\Entities\Interfaces;


interface RouterInterface
{
    public function get($path, $callback);
    public function post($path, $callback);
    public function back($data);
    public function getPath();
    public function getRequestMethod();
    public function getRequestData();
    public function execute();
}
