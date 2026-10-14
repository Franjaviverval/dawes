<?php
require_once('../templates/page.php');
require_once('../templates/table.php');
require_once('DataVideojuegos.php');
initPage('Videojuegos');
?>


<form method="post" class="simple-form" style="margin-bottom:50px;">
  <div class="simple-form__line">   
    <div> 
      <label for="titulo" class="simple-label">Título</label>
      <input name="titulo" class="simple-input" id="titulo" placeholder="Título" required>
    </div>
    <div>
      <label for="genero" class="simple-label">Género</label>
      <select name="genero" class="simple-input" id="genero" placeholder="Género">
        <option>Acción</option>
        <option>Aventura</option>
        <option>Rol</option>
        <option>Plataformas</option>
        <option>Shooter</option>
      <select>
    </div>
    <div>
      <label for="precio" class="simple-label">Precio</label>
      <input type="number" name="precio" class="simple-input" id="precio" min=0 step=0.01 placeholder="0.0">
    </div>
    <input type="hidden" name="add-game" value="1">
  </div>  
  <nav class="simple-form__nav">
    <button type="submit" class="simple-button">Añadir</button>
  </nav>
</form>

<?php
$table = drawInitTable();
$table .= drawTableHeader('', 'ID', 'Titulo', 'Género', 'Precio');
foreach($data as $elemento){
  $borrar = '<form method="post">
  <input type="hidden" name="borrar-id" value="'.$elemento['id'].'">
  <button type="submit" class="simple-button">X</button></form>';  
  $table .= drawTableData($borrar, $elemento['id'], $elemento['titulo'], $elemento['genero'], $elemento['precio']);
}
echo $table.drawEndTable();
endPage();
?>