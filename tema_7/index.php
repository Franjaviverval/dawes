<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('controller/videojuegos_controller.php');

$controller = new Videojuegos_controller();

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])){
   switch($_POST['action']){
      case 'create':
          $controller->create();
           break;
      case 'eliminate': 
         if(isset($_POST['id']))
            $controller->eliminate($_POST['id']);
         break;   
      case 'edit': 
         if(isset($_POST['id']))
            $controller->edit($_POST['id']);
         break;
      case 'modify': 
         if(isset($_POST['id']))
            $controller->modify($_POST['id']);
         break; 
   }
}

$controller->view();

?>