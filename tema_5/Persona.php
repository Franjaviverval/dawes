<?php
class Persona{
  private $dni;
  private $nombre;
  private $email;

  public function __Construct(string $dni, string $nombre, string $email){
    $this->dni = $dni;
    $this->nombre = $nombre;
    $this->email = $email;
  }

  //Getters
  public function getDni() : string{
    return $this->dni;
  }

  public function getNombre() : string{
    return $this->nombre;
  }

  public function getEmail() : string{
    return $this->email;
  }
    
  //Setters
  public function setDni(string $dni) : void{
    $this->dni = $dni;
  }

  public function setNombre(string $nombre) : void{
    $this->nombre = $nombre;
  }

  public function setEmail(string $email) : void{
    $this->email = $email;
  }

//Functions

  public function Mostrar() : void{
    echo "<p>{$this->getNombre()} - {$this->getDni()} - {$this->getEmail()}</p>";    
  }

}
?>