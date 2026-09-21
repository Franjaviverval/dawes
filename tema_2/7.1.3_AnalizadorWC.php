<?php
require_once('../templates/page.php');

function countWords(string $sentence) : int{
  return str_word_count($sentence);
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
  $words = str_word_count($sentence, 1);

  for($i = 0; $i < count($words); $i++){
    echo $words[$i].' => '.countLetters($words[$i]).'<br>';
  }
}

initPage('7.1.3_AnalizadorWC.php');
printStatement('
<p>Investiga que hace la función str_word_count, y vuelve a hacer el ejercicio</p>
');

$sentence = 'Esta es una frase de prueba para el ejercicio';

echo 'Frase: '.$sentence.'<br>';
echo 'Numero de letras: '.countLetters($sentence).'<br>';
echo 'Numero de palabras: '.countWords($sentence).'<br>';

countEveryWord($sentence);

endPage();
?>