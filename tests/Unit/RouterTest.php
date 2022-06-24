<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use String\SortApplication\Application;
use String\SortApplication\Controller\Home;

final class RouterTest extends TestCase
{

    public function testGetRoute(){

        $application = new Application();

        $application->router->get('/',[Home::class,'index']);
        $application->router->post('/sort',[Home::class,'sort']);
        $this->assertTrue(true);

    }

}
