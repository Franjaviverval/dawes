<?php

if(!$validation['user']){
  echo 'Usuario incorrecto <br>';
} 
if(!$validation['password']){
  echo 'Contraseña incorrecta<br>';
} 

echo '<button onclick="location.href=\'7.0.4_Login.php\'" style="font-size: 2.5rem; padding: 10px 15px; display: block; margin: 0 auto;">Volver</button>';
?>