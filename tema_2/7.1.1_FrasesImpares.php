<?php
require_once('../templates/page.php');
initPage('7.1.1_FrasesImpares.php');

printStatement('Lee una frase y devuelve una nueva con solo los caracteres de las posiciones impares.');

$sentence = 'Esta es una frase que ha de ser mostrada solo con los caracteres de las posiciones impares';

echo "<p>Cadena: $sentence</p>";

echo '<br><p>';
for($i = 0; $i < strlen($sentence); $i += 2)
  echo $sentence[$i];
echo '</p';

endPage();
?>