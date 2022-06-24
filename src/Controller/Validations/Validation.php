<?php


namespace String\SortApplication\Controller\Validations;


use String\SortApplication\Entities\AbstractClasses\ValidationAbstract;
use String\SortApplication\Entities\Interfaces\ValidationInterface;
use String\SortApplication\Router;

class Validation extends ValidationAbstract implements ValidationInterface
{
    protected $rules;
    private $errorMessages = [];
    protected $data = [];
    protected $maxSortStringLength = 30;

    public function __construct($data){
        $this->rules = new Rules();
        $this->data = $data;
        $this->loadData();
    }


    public function getErrorMessage($rule){
        return $this->rules->errorMessages()[$rule];
    }

    public function validate(){
        foreach($this->rules->rules() as $key => $rule){
            $value = $this->{$key};
            foreach($rule as $singleRule){

                if($this->isString($singleRule,$value)){
                    $this->errorMessages[$key][] = $this->getErrorMessage($this->rules::string);
                }

                if($this->isRequired($singleRule,$value)){

                    $name =  $this->generateTitleCaseName($key);
                    $this->errorMessages[$key][] = str_replace('{name}',$name,$this->getErrorMessage($this->rules::required));
                }

                if($this->maxLength($singleRule,$value)){
                     $name =  $this->generateTitleCaseName($key);
                     $newString = str_replace('{name}',$name,$this->getErrorMessage($this->rules::max));
                     $this->errorMessages[$key][] =  str_replace('{max}',$this->maxSortStringLength,$newString);
                }

            }
        }

         if(count($this->errorMessages) > 0){
            $router = new Router();
            $router->back([...$this->data,"errors"=>$this->errorMessages]);
            exit;
         }
         return true;
    }
}
