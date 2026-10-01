<?php
require_once('Persona.php');

class Estudiante extends Persona{
  private $numExpediente;

  public function __Construct(string $dni, string $nombre, string $email, int $numExpediente){
    parent::__construct($dni, $nombre, $email);
    $this->numExpediente = $numExpediente;
  }

  //Getters
  public function getNumExpediente() : int{
    return $this->numExpediente;
  }

  //Setters
  public function setNumExpediente(int $numExpediente) : void{
    $this->numExpediente = $numExpediente;
  }
  
  public function Mostrar() : void{
  echo "<p>{$this->getNombre()} - {$this->getDni()} - {$this->getEmail()} - {$this->getNumExpediente()}</p>";
  }

}

?>