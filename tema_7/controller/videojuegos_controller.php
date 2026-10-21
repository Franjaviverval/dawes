<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('model/videojuegos_model.php');

class Videojuegos_controller{

   public function view(){
      $database = new Videojuegos_model();
      $data = $database->leer() ?? [];
      $database->liberar();                

      $edit = false;
      require_once('view/videojuegos_view.php');
   }

   public function create(){
      $database = new Videojuegos_model();

      $titulo = trim($_POST['title'] ?? '') ;
      $genero = trim($_POST['gender'] ?? '') ;
      $precio = (float)($_POST['price'] ?? 0);

      if($titulo !== '' && $genero !== '')
         $database->insertar($titulo, $genero, $precio); 

      $database->liberar();
   }

   public function eliminate(int $id) : void{
      $database = new Videojuegos_model();
      $database->borrar($id);
      $database->liberar();
   }

   public function edit(int $id) : void{
      $database = new Videojuegos_model();
      $data = $database->leer() ?? [];
      $database->liberar();                

      $edit = true;
      $pos = 0;
      
      for($i = 0; $i < count($data); $i++){
         if($data[$i]['id'] === $id){
            $pos = $i;
            break;
         }
      }

      require_once('view/videojuegos_view.php');
   }

   public function modify(int $id) : void{
      $database = new Videojuegos_model();
      $data = $database->actualizar($id, $_POST['title'], $_POST['gender'], $_POST['price']);
      $database->liberar();      
   }
}

?>