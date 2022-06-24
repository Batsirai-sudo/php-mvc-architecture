<?php


namespace String\SortApplication\Controller\SortClasses;


use String\SortApplication\Entities\Interfaces\SortStrategyInterface;

class QuickSort implements SortStrategyInterface
{

    public function sort(&$arr)
    {
        $loe = $gt = array();
        if (count($arr) < 2) {
            return $arr;
        }
        $pivot_key = key($arr);
        $pivot = array_shift($arr);

        foreach ($arr as $val) {

            if ($val <= $pivot) {
                $loe[] = $val;

            } elseif ($val > $pivot) {
                $gt[] = $val;

            }
        }

        return array_merge($this->sort($loe), array($pivot_key => $pivot), $this->sort($gt));
    }
}
