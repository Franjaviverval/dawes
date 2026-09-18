<?php
require_once('../templates/page.php');

function validateTime(string $timeString, string $separator = ':') : bool{  
  $timeElements = explode($separator, $timeString);

  if(count($timeElements) != 3  ||
           $timeElements[0] < 0 || $timeElements[0] > 24 ||
           $timeElements[1] < 0 || $timeElements[1] > 60 ||
           $timeElements[2] < 0 || $timeElements[2] > 60)
    return false;

  return true;
}

function showTime(string $timeString, bool $isValid){
  $code = $timeString.' -> ';

  if($isValid)
    $code .= '<span style="color: #00BB00;">Hora introducida es válida</span>';
  else
    $code .= '<span style="color: #FF0000;">Hora introducida es inválida</span>'; 
  
  return $code.'<br>';
}


initPage('7.0.2_CompruebaHora.php');

$validTimeString = '22:03:29';
$invalidTimeString = '26:02:20';

echo showTime($validTimeString, validateTime($validTimeString));
echo showTime($invalidTimeString, validateTime($invalidTimeString));

endPage();
?>