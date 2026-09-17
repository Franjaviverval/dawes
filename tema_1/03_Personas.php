<?php
require_once('../templates/page.php');
initPage('03_Personas.php');

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

$resultado ='
<table>
  <thead>
    <tr>
      <th>
        Nombre
      </th>
      <th>
        Altura
      </th>
      <th>
        Email
      </th>
    </tr>
  </thead>
  <tbody>';

  foreach($personas as $persona){
    $resultado = $resultado."
    <tr>
      <td>{$persona['nombre']}</td>
      <td>{$persona['altura']}</td>
      <td>{$persona['email']}</td>
    </tr>";    
  }
  
$resultado = $resultado.'
  </tbody>
</table>';

echo $resultado;

endPage();
?>