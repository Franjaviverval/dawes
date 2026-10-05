<?php

session_start();

if(isset($_SESSION['students']))
  unset($_SESSION['students']);

session_destroy();

header('Location:5.0.2_Calificaciones.php');
exit();

?>