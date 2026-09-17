<?php
require_once('../templates/page.php');
initPage('02_ArrayAsociativo.php');

printStatement('
Rellena un array de 100 elementos de manera aleatoria con valores M o F (por ejemplo [“M”, “M”, “F”, “M”,…]). Una vez completado, vuelve a recorrerlo y calcula cuantos elementos hay de cada uno de los valores almacenando el resultado en un array asociativo [‘M’ => 44, ‘F’ => 66] (no utilices variables para contar las Mo lasF). Finalmente, muestra el resultado por pantalla');

$my_array = [];

for($i = 0; $i < 100; $i++){
  $randomNumber = rand(0, 1);

  if($randomNumber % 2 == 0)
    $my_array[] = 'M';
  else
    $my_array[] = 'F';
}

sort($my_array);
$count_F = array_search('M', $my_array);

$resultado = ['F'=> $count_F, 'M'=>count($my_array) - $count_F];

echo '<p>';
print_r($resultado);
echo '</p>';

endPage();
?>
