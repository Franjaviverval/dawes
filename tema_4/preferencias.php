<?php
require_once('../templates/page.php');

initPage('Preferencias.php');

echo '<form action="guarda_prefs.php" method="post" style="margin: 0 auto; width: fit-content;border: 1px solid var(--accent-color); padding: 30px;">

  <label for="input-name" style="font-size: 2.5rem; display: block; text-align: center;">Usuario</label>

  <input name="user" id=input-name placeholder="Nombre de usuario" style="font-size: 2.5rem; padding: 10px" required><br><br>

  <label for="input-color" style="font-size: 2.5rem; display: block; text-align: center;">Color favorito</label>

  <input type="color" name="color" id=input-color value="#FFFFFF" style="display:block; margin: 0 auto; width:100px; height:100px;"><br><br>

  <button type="submit" style="font-size: 2rem; padding: 10px 15px; display: block; margin: 0 auto;">Guardar</button>
</form>';

endPage();
?>