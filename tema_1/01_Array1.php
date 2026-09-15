<?php

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

?>