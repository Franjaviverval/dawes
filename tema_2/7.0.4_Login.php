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
?>

<form action="7.0.4_CompruebaLogin.php" method="post" class="simple-form">
  <div class="simple-form__element">
    <label for="input-name" class="simple-label">Usuario</label>
    <input name="user" class="simple-input" placeholder="Usuario" required>
  </div>
  <div class="simple-form__element">
    <label for="input-password" class="simple-label">Contraseña</label>
    <input type="password" name="password" id=input-password placeholder="Contraseña" class="simple-input" required>
  </div>
  <nav class="simple-form__nav">
    <button type="submit" class="simple-button">Acceder</button>
  </nav>
</form>


<?php
endPage();
?>