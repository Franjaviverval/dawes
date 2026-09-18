<?php
require_once('../templates/page.php');

function mayor(): int{
  $greater = func_get_arg(0);
  foreach(func_get_args() as $element){
    if($element > $greater)
      $greater = $element;
  }

  return $greater;
}

function createArray(int $size, int $minValue, int $maxValue) : array{
  $numbers = array();

  for($i = 0; $i < $size; $i++)
    $numbers[] = rand($minValue, $maxValue);

  return $numbers;
}

initPage('7.0.1_ParametrosVariables.php');

printStatement('
<p>
Crea las siguientes funciones:
Una función que devuelva el mayor de todos los números recibidos como parámetro variables: function mayor(): int. Utiliza las funciones func_get_args(), etc…</p>
<p><strong>No puedes usar la función max()</strong>.</p>
');

$numbers = createArray(10, 0, 99);
$code = 'Numbers: '; 

foreach(array_values($numbers) as $element){
  $code .= $element.' ';
}
$code .= '<br><br>';

$code .= 'El mayor de los números es: ';
$code .= '<span style ="color: #D97706;">'.mayor(...$numbers).'</span>';

echo $code;

endPage();
?>