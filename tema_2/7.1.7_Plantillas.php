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
      $data[] = explode(',',fgets($fp));  
    fclose($fp);
  }
    return $data;
}


initPage('7.1.7_Plantillas');

printStatement('
<p>Con el fichero plantillas.csv muestra en un tabla HTML la plantilla del Atlético de Madrid
ordenada por dorsal.</p>
');

$data = getData('../data/plantillas.csv');

$table = '<article style="font-size: 1rem;">';
$table .= drawInitTable();

$table .= drawTableHeader(...$data[0]);
unset($data[0]);
usort($data, function($a, $b){return $a[11] <=> $b[11];});

for($i = 1; $i < count($data); $i++){
  $table .= drawTableData(...$data[$i]);   
}

echo $table.drawEndTable().'</article>';

endPage();
?>