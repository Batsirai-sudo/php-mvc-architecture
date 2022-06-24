<?php


namespace String\SortApplication\Model;


class SortingMethods
{

    private $methods;

    public function __construct(){
        $this->methods = array(
            'BubbleSort',
            'QuickSort'
        );
    }

    public function getMethods(){
        return $this->methods;
    }

}
