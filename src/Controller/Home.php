<?php


namespace String\SortApplication\Controller;

use String\SortApplication\Controller\Validations\Validation;

class Home extends Controller
{


    public  function index(){
        view('home');
    }

    public function sort($request){
        $validation = new Validation($request);
        $validation->validate();

        $data['sortedString'] = $this->processSorting($request);
        $newData = [...$data,...$request];
        view('home',$newData);

    }

    function processSorting($data){

        $stringArray = $this->stringArrayParser($data['sortText']);

        $new =  __NAMESPACE__.'\\SortClasses\\'.$data['sortStrategy'];
        $strategy  = new $new();
        $result =  $strategy->sort($stringArray);

        return $this->stringArrayParser($result,'string');
    }

}
