<?php
require_once('../templates/page.php');
require_once('../templates/table.php');

function getData(string $path) : array{
  $data = [];
  $fp = fopen($path, "r");
  if (!$fp)
    echo "No se ha podido abrir el archivo";
  else{
    while(!feof($fp))                  
      $data[] = explode(';',fgets($fp));  
    fclose($fp);
  }
    return $data;
}

initPage('7.1.6_CasasRuralesTelefonos.php');
printStatement('
<p>Crea un programa llamado <strong>CasasRuralesTelefonos.php</strong> que cargue los datos de este
archivo CSV de casas rurales de la provincia de Castellón.
Queremos quedarnos con el id, localidad, nombre y telefono de las casas rurales que tengan un
teléfono definido, descartando el resto.
El programa debe mostrar por pantalla el listado final procesado, y cuántas casas rurales se
han descartado por tener datos nulos.</p>
');

$data = getData('../data/casas_rurales.csv');


$table = drawInitTable();
$table .= drawTableHeader($data[0][0], $data[0][1], $data[0][3], $data[0][9]);
$discard = 0;

for($i = 1; $i < count($data); $i++){
  if(trim($data[$i][9]) != ''){
    $table .= drawTableData($data[$i][0], $data[$i][1], $data[$i][3], $data[$i][9]);
  }
  else
    $discard++;
}  

echo "<p>Se han descartado $discard por no tener teléfono definido</p>";
echo $table.drawEndTable();

endPage();
?>