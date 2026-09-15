<?php

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

?>