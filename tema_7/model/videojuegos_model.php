<?php
class Videojuegos_model{
   private $host;
   private $nombreBD;
   private $usuario;
   private $password;
   private $estado;
   private $pdo;

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

   public function actualizar(int $id, string $titulo, string $genero, float $precio): void {
      try {
         $consulta = "UPDATE videojuegos
                  SET titulo = :titulo, genero = :genero, precio = :precio
                  WHERE id = :id";
         $peticion = $this->pdo->prepare($consulta);
         $peticion->execute([
            'id' => $id,
            'titulo' => $titulo,
            'genero' => $genero,
            'precio' => $precio            
         ]);
      } catch (PDOException $e) {
         $this->estado = 'Error en la actualización: '.$e->getMessage();
      }
}
   
   public function liberar(): void{
      $this->estado = '';
      $this->pdo = null;
   }
}

?>