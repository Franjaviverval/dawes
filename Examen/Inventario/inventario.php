<?php
require_once('producto.php');

class Inventario{
   private $productos;

   public function __construct(array $data){
      $this->productos = [];

      for($i = 0; $i < count($data); $i++)
         $this->productos[] = new Producto($data[$i]);
   }

   public function getDisponibles() : array{
      $disponibles = [];

      foreach($this->productos as $producto)
         if($producto->isDisponible())
            $disponibles[] = $producto;
      
      return $disponibles;
   }

   public function mostrar() : void{
      include_once('vista.php');
   }


   public function getProductos(){
      return $this->productos;
   }

   public function getValor() : float{
      $suma = 0;
      
      foreach($this->productos as $producto)
         $suma += $producto->getValor();

      return round($suma, 2);
   }

   public function getProducto(int $id) : Producto | null{
      foreach($this->productos as $producto)
         if($producto->getId() == $id)
            return $producto;
      return null;
   }

   public function getNombres() : string {
      $nombres = [];
      foreach($this->productos as $producto)
         $nombres[] = $producto->getNombre();
      
      return implode(', ', $nombres);
   }

   public function getCategorias() : string{
      $categorias = [];

      foreach($this->productos as $producto){
         if(!in_array($producto->getCategoria(), $categorias))
            $categorias[] = $producto->getCategoria();
      }

      return implode(', ', $categorias);
   }

}

?>