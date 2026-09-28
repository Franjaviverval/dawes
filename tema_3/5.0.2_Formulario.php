<?php
require_once('../templates/page.php');
require_once('../templates/table.php');

initPage('5.0.2_Formulario.php');
printStatement('<p>Muestra los valores cargados en una tabla-resumen.</p>');

$table = drawInitTable();

$table .= drawTableData('<div style="color: var(--accent-color);">Nombre</div>', $_REQUEST['name']);
$table .= drawTableData('<div style="color: var(--accent-color);">Apellidos</div>', $_REQUEST['lastname']);
$table .= drawTableData('<div style="color: var(--accent-color);">Email</div>', $_REQUEST['email']);
$table .= drawTableData('<div style="color: var(--accent-color);">URL personal</div>', $_REQUEST['url']);
$table .= drawTableData('<div style="color: var(--accent-color);">Convivientes</div>', $_REQUEST['roomates']);
$table .= drawTableData('<div style="color: var(--accent-color);">Sexo</div>', $_REQUEST['genre']);
$table .= drawTableData('<div style="color: var(--accent-color);">Aficiones</div>', implode(',', $_REQUEST['aficiones']));
$table .= drawTableData('<div style="color: var(--accent-color);">Comidas favoritas</div>', implode(',', $_REQUEST['menu']));

echo $table.drawEndTable();
endPage();
?>