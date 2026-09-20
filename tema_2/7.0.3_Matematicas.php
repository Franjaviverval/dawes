<?php
require_once('../templates/page.php');

function digitos(int $num) : int{  
  return strlen("$num");
}

function digitoN(int $num, int $pos) : int{
  return "$num"[$pos - 1];
}

function quitaPorDetras(int $num, int $cant): int{
  return substr("$num", 0, strlen("$num") - $cant);
}

function quitaPorDelante(int $num, int $cant): int{
  return substr("$num", $cant);
}

initPage('7.0.3_Matematicas');
printStatement('
<p>Añade las siguientes funciones:</p>
<p>• digitos(int $num): int→devuelve la cantidad de dígitos de un número.</p>
<p>• digitoN(int $num, int $pos): int→devuelve el dígito que ocupa, empezando por la izquierda, la posición $pos.</p>
<p>• quitaPorDetras(int $num, int $cant): int → le quita por detrás (derecha) $cant dígitos</p>
<p>• quitaPorDelante(int $num, int $cant): int→le quita por delante(izquierda) $cant dígitos.</p>');

$number = rand(100, 100000000);
$pos    = rand(1, strlen("$number") - 1);
$cant   = rand(1, strlen("$number"));

echo '$num = '.$number.'<br>';
echo '$pos = '.$pos.'<br>';
echo '$cant = '.$cant.'<br><br>';

echo '<span style="color: var(--main-color);">digitos(int $num)</span> => '.digitos($number).'<br>';
echo '<span style="color: var(--main-color);">digitoN(int $num, int $pos)</span> => '.digitoN($number, $pos).'<br>';
echo '<span style="color: var(--main-color);">quitaPorDetras(int $num, int $cant)</span> => '.quitaPorDetras($number, $cant).'<br>';
echo '<span style="color: var(--main-color);">quitaPorDelante(int $num, int $cant)</span> => '.quitaPorDelante($number, $cant).'<br>';

endPage();
?>