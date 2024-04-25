<?php
require './Core/Database.php';
require './Model/BaseModel.php';
require './Controllers/BaseController.php';
$controllernam= ucfirst((strtolower($_REQUEST['controller'] ?? 'home') ?? 'home'). 'Controller' ) ;
$acctionname=$_REQUEST['action']?? 'index';
require "./Controllers/${controllernam}.php";
$controllerObject =  new $controllernam();
$controllerObject->{$acctionname}();
?>