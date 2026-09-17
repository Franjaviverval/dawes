<?php
require_once('../templates/page.php');
require_once('../templates/table.php');

initPage('7.0.4_Garaje.php');

printStatement('
Crea una página llamada Garaje.php. Define dentro un array bidimensional mixto donde:
La primera dimensión sea asociativa. Aquí pondremos matrículas de coches. La segunda dimensión será numérica. En cada casilla guardaremos la marca, modelo y número de puertas del coche en cuestión. Por ejemplo, el coche con matrícula “111BCD” puede ser un “Ford” (casilla 0), modelo “Focus” (casilla 1) de 5 puertas(casilla 2). Rellena el array con al menos 3 o 4 coches, y después utiliza las estructuras adecuadas para recorrerlo mostrando los datos de los coches ordenados por matrícula.
');

$cars = array(
'111BCD' => array('Ford', 'Focus', 5),
'333DED' => array('Audi', 'A6 e-tron', 4),
'222CCD' => array('Kia', 'Sorento', 2),
'011ABD' => array('Opel', 'Astra', 4),
);

ksort($cars);

$table = drawInitTable().drawTableHeader('Matrícula', 'Marca', 'Modelo', 'Nº Puertas');

foreach($cars as $matricula => $data){
  $table .= drawTableData($matricula, ...$data);
}

echo $table.drawEndTable();

endPage();
?>