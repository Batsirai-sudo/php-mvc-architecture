<?php

 use String\SortApplication\Controller\Template\RenderView;

     function view($template,$data=[],$layout='appliaction'){

         $renderView = new RenderView($template,$data,$layout);
         $renderView->render();
  }



