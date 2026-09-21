<?php

if(!$validation['user']){
  echo 'Usuario incorrecto <br>';
} 
if(!$validation['password']){
  echo 'Contraseña incorrecta<br>';
} 

header("refresh:3; url=7.0.4_Login.php");
exit();

?>