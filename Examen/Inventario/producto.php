<?php

class Producto{
   private $id;
   private $nombre;
   private $precio;
   private $stock;
   private $categoria;
   private $estado;

   public function __construct($data){
      $this->id = $data['id'];
      $this->nombre = $data['nombre'];
      $this->precio = $data['precio'];
      $this->stock = $data['stock'];
      $this->categoria = $data['categoria'];
      $this->setEstado();
   }

   public function isDisponible() : bool{
      return $this->stock > 0;
   }

   public function getValor() : float{
      return $this->stock * $this->precio;
   }

   public function getId() : int{
      return $this->id;
   }

   public function getNombre() : string{
      return $this->nombre;
   }

   public function getCategoria() : string {
      return $this->categoria;
   }

   public function getPrecio() : float {
      return $this->precio;
   }

   public function getStock() : int {
      return $this->stock;
   }

   public function getEstado() : string {
      return $this->estado;
   }

   public function setEstado(){
      if($this->stock == 0)
         $this->estado = 'agotado';
      elseif($this->stock <= 3)
         $this->estado = 'stock bajo';
      else
         $this->estado = 'Otros Casos';
   }
}

?>