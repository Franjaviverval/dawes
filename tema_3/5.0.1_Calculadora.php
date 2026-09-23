<?php
require_once('../templates/page.php');

function showGets(){
  echo '<h2 style="font-size: 1.75rem;">Valores en $_GET</h2>';
  echo '<article style="font-size: 1.25rem;">';
  print_r($_GET);
  echo '<br>Suma: '.$_GET['x'] + $_GET['y'].'  ';
  echo 'Resta: '.$_GET['x'] - $_GET['y'].'  ';
  echo 'Multiplicación: '.$_GET['x'] * $_GET['y'].'  ';
  echo 'División: '.$_GET['x'] / $_GET['y'].'<br>';
  echo '</article>';
  }
  
  function showServer(){  
    echo '<h2 style="font-size: 1.75rem;">Valores en $_SERVER</h2>';
    echo '<article style="font-size: 1.4rem;">';

    $keys = array_keys($_SERVER);
    foreach($keys as $key)
      echo $key.'=>'.$_SERVER[$key].'<br>';

    echo '</article>';
  }

function showClient(){  
  echo '<h2 style="font-size: 1.75rem;">Realiza la petición</h2>';
  echo '<article style="font-size: 1.4rem;">';
  echo '$_SERVER[\'REMOTE_ADDR\'] => '.$_SERVER['REMOTE_ADDR'];
  echo '</article>';
}

function showVariables(){
  echo '<h2 style="font-size: 1.75rem;">Variables de la petición</h2>';
  echo '<article style="font-size: 1.4rem;">';
  echo '$_SERVER[\'QUERY_STRING\'] => '.$_SERVER['QUERY_STRING'];
  echo '</article>';
}

function showURL(){
  echo '<h2 style="font-size: 1.75rem;">Ruta del sitio web</h2>';
  echo '<article style="font-size: 1.4rem;">';
  echo '$_SERVER[\'SERVER_SCHEME\'].//$_SERVER[\'SERVER_NAME\'].$_SERVER[\'REQUEST_URI\'] => '.$_SERVER['REQUEST_SCHEME'].'//'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
  echo '</article>';
}

initPage('5.0.1_Calculadora.php');
printStatement('
<p>Escribe un programa calculadora.php que acepte por la dirección las variables $x y $y y que:</p>
<p>Muestra por pantalla:</p>
<p>• El valor del array $_GET (utiliza la función print_r())</p>
<p>• La suma, resta, multiplicación y división de x e y.</p>
<p>• El valores de la variable $_SERVER.</p>
<p>• ¿Cual es el ordenador que hace la petición?</p>
<p>• En qué variable están los parámetros de la petición.</p>
<p>• ¿Qué es la ruta del sitio web en el ordenador local ?</p>
<p>• Utiliza una vista para mostrar el resultado. calculadora.view.php</p>
');

showGets();
showServer();
showClient();
showVariables();
showURL();

endPage();
?>