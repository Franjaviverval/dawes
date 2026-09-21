<?php
require_once('../templates/page.php');

function convertToCani(string $sentence) : string{
  $convert = false;
  for($i = 0; $i < strlen($sentence); $i++){
    if($sentence[$i] != ' ')
      $convert = !$convert;
    if($convert)
      $sentence[$i] = strtoupper($sentence[$i]);     
  }

  return $sentence;
}


initPage('7.1.4_Cani.php');
printStatement('
<p>EsCrIbE uNa FuNcIóN qUe TrAnSfOrMe UnA cAdEnA eN cAnI.</p>
');

$sentence = 'Cadena que va a ser transformada en formato Cani';

echo 'Frase: '.$sentence.'<br>';
echo 'convertida: '.convertToCani($sentence).'<br>';

endPage();
?>