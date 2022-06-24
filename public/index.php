<?php

define('ROOT_DIR', dirname(__DIR__).DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_DIR. 'src'.DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR);
define('CONTROLLER_PATH', ROOT_DIR. 'src'.DIRECTORY_SEPARATOR.'Controller'.DIRECTORY_SEPARATOR);

require_once ROOT_DIR .'vendor/autoload.php';

use String\SortApplication\Application;
use String\SortApplication\Controller\Home;

$app = new Application();

$app->router->get('/',[Home::class,'index']);
$app->router->post('/sort',[Home::class,'sort']);


$app->run();
