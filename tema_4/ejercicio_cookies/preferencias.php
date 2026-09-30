<?php
require_once('../../templates/page.php');

initPage('Preferencias.php','../../styles/styles.css');

?>

<form action="guarda_prefs.php" method="post" class="simple-form" >
  <div class="simple-form__element">
    <label for="input-name" class="simple-label">Usuario</label>
    <input name="user" id=input-name placeholder="Nombre de usuario" class="simple-input" required>
  </div>
  <div class="simple-form__element">
    <label for="input-color" class="simple-label">Color favorito</label>
    <input type="color" name="color" id=input-color value="#FFFFFF">
  </div>
  <nav class="simple-form__nav">
    <button type="submit" class="simple-button">Guardar</button>
  <nav>
</form>

<?php
endPage();
?>