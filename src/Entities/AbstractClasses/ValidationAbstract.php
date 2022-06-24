<?php


namespace String\SortApplication\Entities\AbstractClasses;


abstract class ValidationAbstract
{

    public function loadData(){
        foreach($this->data as $key => $value){
            if(!property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }

    public function generateTitleCaseName($value){
        $name = preg_replace('/(?<!\ )[A-Z]/', ' $0', $value);
        return ucfirst($name);
    }

    public function isString($ruleName,$value){
        return $ruleName === $this->rules::string && !is_string($value);
    }

    public function isRequired($ruleName,$value){
        return $ruleName === $this->rules::required && !$value;
    }

    public function maxLength($ruleName,$value){
        return $ruleName === $this->rules::max && strlen($value) > $this->maxSortStringLength;
    }


}
