<?php


namespace String\SortApplication\Controller\Template;


use String\SortApplication\Model\SortingMethods;

class RenderView
{
    private $layout;
    private $template;
    private $viewsFolder = 'pages';
    private $data;
    private $sortMethods;

    public function __construct($template,$data,$layout){
          $this->layout = $layout;
          $this->template = $template;
          $this->data = $data;
          $this->sortMethods = new SortingMethods();

    }

    public function render(){
       $layoutContent = $this->renderLayout();
       $viewContent = $this->renderView();

       return str_replace('<x-application/>',$viewContent,$layoutContent);
    }

    public function renderLayout(){
       return include_once VIEW_PATH.'layouts/'.$this->layout.'.php';
    }

    public function renderView(){
        extract($this->data);
        $sortMethods = $this->sortMethods->getMethods();

        $file = VIEW_PATH.$this->viewsFolder.DIRECTORY_SEPARATOR.$this->template.'.php';

        if(file_exists($file)){
            return include_once $file ;
        }

        $fileName = str_replace('.','/',$this->template);
        return include_once VIEW_PATH.DIRECTORY_SEPARATOR.$fileName.'.php';
    }
}
