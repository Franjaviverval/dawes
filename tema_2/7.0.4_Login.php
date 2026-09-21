<?php
require_once('../templates/page.php');

initPage('7.0.4_login.php');

printStatement('
<p>Vamosa simular un formulario de acceso:</p>
<p><strong>login.php</strong>:el formulariode entrada, que solicita el usuario y contraseña.
<strong>compruebaLogin.php</strong>: recibe los datos y comprueba si son correctos(los usuarios se guardan en un array asociativo) pasando el control mediante el uso de include a:</p>
<p><strong>ok.php</strong>: El usuario introducido es correcto</p>
<p><strong>ko.php</strong>: El usuario es incorrecto. Informar si ambos están mal o solo la contraseña. Volver a mostrar el formulario de acceso</p>
');

echo 
'<form action="7.0.4_CompruebaLogin.php" method="post" style="margin: 0 auto; width: fit-content">
  <label for="input-name" style="font-size: 4rem; display: block; text-align: center;">Usuario</label>
  <input name="user" id=input-name placeholder="Nombre de usuario" style="font-size: 2.5rem; padding: 10px" required><br><br>
  <label for="input-password" style="font-size: 4rem; display: block; text-align: center;">Contraseña</label>
  <input type="password" name="password" id=input-password placeholder="Contraseña" style="font-size: 2.5rem; padding: 10px" required><br><br>
  <button type="submit" style="font-size: 2.5rem; padding: 10px 15px; display: block; margin: 0 auto;">Acceder</button>
</form>';


endPage();
?>