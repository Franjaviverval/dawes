<?php
require_once('../templates/page.php');

function countWords(string $sentence) : int{
  return count(explode(' ', $sentence));
}

function countLetters(string $sentence) : int{
  $total = 0;

  for($i = 0; $i < strlen($sentence); $i++){   
    if(strtolower($sentence[$i]) >= 'a' && strtolower($entence[$i]) <= 'z')
      $total++;
  }

  return $total;
}

function countEveryWord(string $sentence){
  $words = explode(' ', $sentence);

  for($i = 0; $i < count($words); $i++){
    echo $words[$i].' => '.countLetters($words[$i]).'<br>';
  }
}

initPage('7.1.2_Analizador.php');
printStatement('
<p>A partir de una frase con palabras sólo separadas por espacios, devolver:</p>
<p>• Letras totales y cantidad de palabras</p>
<p>• Una línea por cada palabra indicando su tamaño</p>
<p><strong>Nota</strong>: no se puede usar str_word_count</p>
');

$sentence = 'Esta es una frase de prueba para el ejercicio';

echo 'Frase: '.$sentence.'<br>';
echo 'Numero de letras: '.countLetters($sentence).'<br>';
echo 'Numero de palabras: '.countWords($sentence).'<br>';

countEveryWord($sentence);

endPage();
?>