<?php


namespace String\SortApplication\Entities\AbstractClasses;


abstract class RouterAbstract
{
    public function getRequestMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getRequestData(){
        $inputData = array();

        if($this->getRequestMethod() === 'post') {
            foreach($_POST as $key => $value){
                $inputData[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            return $inputData;
        }
    }

    public function getPath(){
        $path = $_SERVER['REQUEST_URI'];
        $queryQuestionMarkPos = strpos($path, '?');
        if ($queryQuestionMarkPos === false) {
            return $path;
        }
        return substr($path, 0, $queryQuestionMarkPos);
    }

}
