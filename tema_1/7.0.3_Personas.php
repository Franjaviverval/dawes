<?php
require_once('../templates/page.php');
require_once('../templates/table.php');

initPage('7.0.3_Personas.php');

printStatement('
Mediante un array bidimensional, almacena el nombre, altura y email de 5 personas. Para ello, crea
un array de personas, siendo cada persona un array asociativo: [ [‘nombre’=>‘Aitor’, ‘altura’=>182,
‘email’=>‘aitor@correo.com’],[…],… ] Posteriormente, recorre el array y muéstralo en una tabla
HTML.
');

$personas = array(
  array('nombre'=>'Aitor', 'altura'=>170, 'email'=>'aitor@correo.com'),
  array('nombre'=>'Sandra', 'altura'=>173, 'email'=>'sandra@correo.com'),
  array('nombre'=>'Ana', 'altura'=>164, 'email'=>'ana@correo.com'),
  array('nombre'=>'Pedro', 'altura'=>155, 'email'=>'pedro@correo.com'),
  array('nombre'=>'Sara', 'altura'=>166, 'email'=>'ana@correo.com'),
);

$table = drawInitTable().drawTableHeader('Nombre', 'Altura', 'Email');
foreach($personas as $persona)
      $table .= drawTableData($persona['nombre'], $persona['altura'], $persona['email']); 
$table .= drawEndTable();
echo $table;

endPage();
?>