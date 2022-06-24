<?php


namespace String\SortApplication\Controller;


class  Controller
{

    public function stringArrayParser($data,$type='array'){
        if ($type == 'string'){
            return implode("",$data);
        }
        return str_split($data,1);
    }

}
