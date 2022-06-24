<?php


namespace String\SortApplication\Controller\Validations;


class Rules{

    const required = 'required';
    const string = 'string';
    const max = 'max';
    const strategy = 'strategy';


    public function rules(){
        return array(
            'sortText' => [self::required,self::string,self::max],
            'sortStrategy' => [self::required,self::strategy]
        );
    }

    public function errorMessages(){
        return [
           self::required => '{name} is a required field.',
           self::string => 'Text needs to be a valid string without special characters',
           self::max => 'The maximum length of the {name} must be {max}'
        ];
    }

}
