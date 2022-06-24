<?php


namespace Unit;


use PHPUnit\Framework\TestCase;
use String\SortApplication\Controller\Validations\Validation;

class ValidationTest extends TestCase
{

    public function testValidation(){

        $validation = new Validation(
            [
                'sortText'=>'',
                'sortStrategy'=> ''
            ]);

        $valid = $validation->validate();

        $this->assertTrue($valid);
    }

}
