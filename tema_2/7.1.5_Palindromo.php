<?php
require_once('../templates/page.php');

function isPalindrome(string $sentence) : bool{
  $aux = str_ireplace(' ', '', $sentence);
  $head = 0;
  $tail = strlen($aux) - 1;

  while($head < $tail){
    if(strtolower($aux[$head++]) != strtolower($aux[$tail--])){      
      return false;
    }
  }

  return true;
}

function show(string $sentence){
  if(isPalindrome($sentence))
    echo $sentence.' es palíndromo<br>';
  else
    echo $sentence.' no es palíndromo<br>';
}


initPage('7.1.5_Palindromo.php');
printStatement('
<p>Escribe una función que devuelva un booleano indicando si una palabra es palíndroma (se lee
igual de izquierda a derecha que de derecha a izquierda, por ejemplo, <strong>ligar es ser agil</strong></p>
');

$palindrome = 'ligar es ser agil';
$no_palindrome = 'esto es otra cosa';

show($palindrome);
show($no_palindrome);

endPage();
?>