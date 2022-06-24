<?php


namespace String\SortApplication\Entities\Interfaces;


interface ValidationInterface{

public function validate();
public function getErrorMessage($rule);

}
