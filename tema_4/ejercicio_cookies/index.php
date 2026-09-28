<?php
require_once('../../templates/page.php');

$backgroundColor = 'white';
$title = '5.0.1_Ejercicio_Cookies';
$message = 'Página de inicio';

if(isset($_COOKIE['colorusu']) && isset($_COOKIE['nombreusu'])){  
  $backgroundColor = $_COOKIE['colorusu'];
  $message = 'Bienvenid@ '.$_COOKIE['nombreusu'].' esperamos que el entorno sea de su agrado';
}else{
  $message = 'Página de inicio';
}


echo drawInitPage('5.0.1_Ejercicio_Cookies', '../../styles/styles.css').drawHeader("$title")
     ."<article class=\"console\" style=\"background-color: $backgroundColor; color: var(--main-color);\">";

echo "<p style=\"text-align: center;\">$message</p>";
echo '<br><br><a href="preferencias.php" style="display:block; text-align:center;"><button style="font-size:2rem;">Configurar</button></a><br>';
echo '<a href="borrar_prefs.php" style="display:block; text-align:center;"><button style="font-size:1.5rem;">Borrar configuración</button></a>';

endPage();
?>