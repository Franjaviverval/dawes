<?php
require_once('../templates/page.php');
initPage('7.0.1_Array1.php');

printStatement('
<p>Rellena un array con 5 números aleatorios comprendidos entre el 0 y el 99,y luego muéstralo en una lista desordenada. Para crear un número aleatorio,utiliza la función rand(inicio,fin)=>$num = rand (0, 99)<p>
• Como mejora comprobar que los números no existan.<br>
• Ordenar la salida del vector.<br>
• Calcula: el mayor, el menor y la media
');

$mi_array = [];

for($i = 0; $i < 50; $i++){
    $newElement;
    do{
        $newElement = rand(0, 99);
    }while(in_array($newElement, $mi_array));    
    $mi_array[] = $newElement;
}

sort($mi_array);

echo '<ul>';
for($i = 0; $i < count($mi_array); $i++){
    echo  '<li>'.$mi_array[$i].'</li>';
}
echo '</ul>';

echo '<p><br>'.
'El número mayor es: '.$mi_array[count($mi_array) - 1]
.'<br>'
.'El número menor es: '.$mi_array[0]
.'<br>'
.'La media es: '.array_sum($mi_array)/count($mi_array)
.'</p>';

endPage();
?>