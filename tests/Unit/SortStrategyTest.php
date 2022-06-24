<?php


namespace Unit;


use PHPUnit\Framework\TestCase;
use String\SortApplication\Controller\Controller;
use String\SortApplication\Controller\SortClasses\BubbleSort;
use String\SortApplication\Controller\SortClasses\QuickSort;

class SortStrategyTest extends TestCase
{

    public function testSortStrategies(){

        $input = 'befdac';
        $expected = 'abcdef';

        $strategiesArray = [
           'bubbleSortStrategy' => new BubbleSort(),
           'quickSortStrategy' => new QuickSort(),
        ];


        $controller = new Controller();

        foreach ($strategiesArray as $strategy) {
            $arr = $controller->stringArrayParser($input);
            $arrayResult = $strategy->sort($arr);

            $result = $controller->stringArrayParser($arrayResult,'string');
            $this->assertEquals($result,$expected);
        }

    }
}
