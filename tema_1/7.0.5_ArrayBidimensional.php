<?php
require_once('../templates/page.php');

define('MIN_VALUE', 100);
define('MAX_VALUE', 999);
define('ROWS', 6);
define('COLUMNS', 9);
define('COLOR', array('Blue'=>'#0000A2', 'Green'=>'#00BB00','Black'=>'#000000'));

function isInside($keyElement, $array){
  foreach($array as $subarray)
    foreach($subarray as $element)
      if($element == $keyElement)
        return true;  
  return false;
}

function createArray(int $rows, int $columns, int $min, int $max) : array{
  $my_array = [];
  
  for($i = 0; $i < $rows; $i++){
    $my_array[] = [];
    for($j = 0; $j < $columns; $j++){
      $newNumber;
      do{
        $newNumber = rand($min, $max);
      }while(isInside($newNumber, $my_array));
      $my_array[$i][$j] = $newNumber;
    }
  }

  return $my_array;
}

function getKeyValues($array){  
  $maxValue = MIN_VALUE - 1;  
  $minValue = MAX_VALUE + 1;
  $keyValues = array('maxColumn'=> 0, 'minRow'=> 0);

  for($i = 0; $i < count($array); $i++){
    for($j = 0; $j < count($array[$i]); $j++){
      if($array[$i][$j] > $maxValue){
        $maxValue = $array[$i][$j];
        $keyValues['maxColumn'] = $j;
      }
      if($array[$i][$j] < $minValue){
        $minValue = $array[$i][$j];
        $keyValues['minRow'] = $i;
      }
    }
  }
  return $keyValues;
}

function getColor($keyValues, $row, $column = 0){
  if($column == $keyValues['maxColumn'])
    return COLOR['Blue'];
  if($row == $keyValues['minRow'])
    return COLOR['Green'];
  return COLOR['Black'];
}

function printArray($array){
  $keyValues = getKeyValues($array); 
  $code = '';

  for($i = 0; $i < count($array); $i++){    
    for($j = 0; $j < count($array[$i]); $j++){   
      $code .= '<div style="color: '.getColor($keyValues, $i, $j).'; display: inline-block; margin: 10px">';
      $code .= $array[$i][$j];
      $code .= '</div>';
    }
    $code .= '<br>';
  }

  echo $code;  
}


initPage('7.0.5_ArrayBidimensional.php');

printStatement('
<p>Rellena un array bidimensional de 6 filas por 9 columnas con números aleatorios comprendidos entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos, es decir, no se puede repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que:</p>
• La columna del máximo debe aparecer en azul.<br>
• La fila del mínimo debe aparecer en verde.<br>
• El resto de números deben aparecer en negro.<br>
');

$numbers = createArray(ROWS, COLUMNS, MIN_VALUE, MAX_VALUE);
printArray($numbers);

endPage();
?>