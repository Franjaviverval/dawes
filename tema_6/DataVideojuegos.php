<?php

class DataVideojuegos{

  public function __Construct(){
    $this->host = 'localhost';
    $this->nombreBD = 'videojuegos';
    $this->usuario = 'root';
    $this->password = '';
    $this->estado = '';
    $this->pdo = null;
    $this->connect();
  }


  public function connect() : bool{
      try{
         $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->nombreBD;charset=utf8", $this->usuario, $this->password);
         $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->estado = 'Conexión realizada correctamente';
         return true;
      }
      catch(PDOException $e){
         $this->pdo = null;
         $this->estado = "Error de conexión: ".$e->getMessage();
         return false;
      }
   }

   public function getEstado() : string {
      return $this->estado;
   }

   public function isConnected() : bool{
      return $this->pdo !== null;
   }

   public function insertar(string $titulo, string $genero, float $precio) : bool{
        if(!$this->isConnected())
         return false;

        try{
         $consulta = "INSERT INTO {$this->nombreBD}(titulo, genero, precio) VALUES(:nombre, :genero, :precio)";
         $peticion = $this->pdo->prepare($consulta);
         
         $peticion->bindParam(':nombre', $titulo);
         $peticion->bindParam(':genero', $genero);
         $peticion->bindParam(':precio', $precio);

         return $peticion->execute();
      }
      catch(PDOException $e){
         $this->estado = 'Error en la inserción: '.$e->getMessage();
         return false;
      }
   }

   public function leer() : array | null{
      $data = [];

      if(!$this->isConnected())
         return null;
      try{
         $consulta = $this->pdo->query("SELECT * FROM {$this->nombreBD}");
         $consulta -> setFetchMode(PDO::FETCH_ASSOC);
         $consulta->execute();
         while($registro = $consulta->fetch()){
            $elemento = [
               'id'     => $registro['id'],
               'titulo' => $registro['titulo'],
               'genero' => $registro['genero'],
               'precio' => $registro['precio']];            
            $data[] = $elemento;
         }
         return $data;
      }
      catch(PDOException $e){
         $this->estado = 'Error en la lectura: '.$e->getMessage();
         return null;
      }
   }

   public function borrar(int $id) : void{
      if(!$this->isConnected())
         return;

      try{
         $consulta = "DELETE FROM {$this->nombreBD} WHERE id = :id";
         $peticion = $this->pdo->prepare($consulta);
         $peticion->execute([':id' => $id]);
      }
      catch(PDOException $e){
         $this->estado = 'Error en el borrado: '.$e->getMessage();         
      }
   }
   
   public function liberar(): void{
      $this->estado = '';
      $this->pdo = null;
   }
}

//Funciones 

function crear() : void{
   $database = new DataVideojuegos();

   $titulo = trim($_POST['titulo'] ?? '') ;
   $genero = trim($_POST['genero'] ?? '') ;
   $precio = (float)($_POST['precio'] ?? 0);

   if($titulo !== '' && $genero !== '')
      $database->insertar($titulo, $genero, $precio); 

   $database->liberar();
}

function borrar(int $id) : void{
   $database = new DataVideojuegos();
   $database->borrar($id);
   $database->liberar();
}

function leer(){
   $database = new DataVideojuegos();
   $data = $database->leer() ?? [];
   $database->liberar();
   return $data;
}

// Ejecucion

if($_SERVER['REQUEST_METHOD'] === 'POST')    
   if(isset($_POST['borrar-id']))
      borrar((int)$_POST['borrar-id']);   
   else if(isset($_POST['add-game']))
      crear();    

$data = leer();

?>