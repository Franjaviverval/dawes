<?php
require_once('../templates/page.php');
require_once('../templates/table.php');

function showStudents(array $students) : void{
  $table = drawInitTable();
  $table .= drawTableHeader('Nombre', 'Primer', 'Segundo', 'Tercero', 'Media');

  for($i = 0; $i < count($students); $i++)
    $table .= drawTableData(...$students[$i]);

  echo $table.drawEndTable();
}

initPage('Calificaciones.php');
printStatement('<p>Crear una pequeña aplicación que permita la gestión académica del módulo de DWES. Interesa almacenar las notas de cada trimestre y mostrar un informe con las notas la media y el nombre de los alumnos. Tambiés debe haber un botón/enlace para borrar los datos</p>');
?>

<form action="" method="post" class="simple-form">
  <h2 class="simple-form__title">Calificación alumnos</h2>
  <input type="text" class="simple-input" name="student-name" id="input-name" placeholder="Nombre alumno" >
  <input type="number" class="simple-input" name="mark1" id="input-mark1" min=0 max=10 placeholder="Nota 1" >
  <input type="number" class="simple-input" name="mark2" id="input-mark2" min=0 max=10 placeholder="Nota 2" >
  <input type="number" class="simple-input" name="mark3" id="input-mark3" min=0 max=10 placeholder="Nota 3" >
  <button type="submit" class="simple-button">Añadir</button>
</form>

<h2>Lista de Alumnos</h2>

<?php

session_start();

if(!isset($_SESSION['students'])){
  $_SESSION['students'] = [];
}

if(isset($_POST['student-name']) && isset($_POST['mark1']) && isset($_POST['mark2']) && isset($_POST['mark3'])){
  $student = ['name' => trim($_POST['student-name']),
              'mark1' => $_POST['mark1'] === '' ? 0 : $_POST['mark1'],
              'mark2' => $_POST['mark2'] === '' ? 0 : $_POST['mark2'],
              'mark3' => $_POST['mark3'] === '' ? 0 : $_POST['mark3'],
              'average' => 0
             ];
  $student['average'] =round( ($student['mark1'] + $student['mark2'] + $student['mark3']) / 3, 2);

  $_SESSION['students'][] = $student;
}

showStudents($_SESSION['students']);

echo '<a href="5.0.2_CloseSession.php" class="simple-button" style="text-decoration: none;">Borrar Notas</a>';
?>


<?php
endPage();
?>