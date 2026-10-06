<?php
define('CREDENTIALS_FILE', 'usuarios.txt');

require_once('../../templates/page.php');
initPage('Login.php', '../../styles/styles.css');
?>

<form action="" method="post" class="simple-form">
  <div class="simple-form__element">
    <label for="user" class="simple-label">Usuario</label>
    <input name="user" class="simple-input" id="user" placeholder="Usuario" required>
  </div>
  <div class="simple-form__element">
    <label for="password" class="simple-label">Contraseña</label>
    <input type="password" name="password" id=password placeholder="Contraseña" class="simple-input" required>
  </div>
  <nav class="simple-form__nav">
    <button type="submit" class="simple-button">Acceder</button>
  </nav>
</form>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $userName = trim($_POST['user']) ?? '';
  $userPassword = trim($_POST['password']) ?? '';

  if($file = fopen(CREDENTIALS_FILE, 'r')){
    while(!feof($file)){
      $data = explode(':', trim(fgets($file)));

      if($data[0] === $userName && $data[1] === $userPassword){
        session_start();
        $_SESSION['loginusu'] = $userName;
        header('Location:index.php');
        exit();
      }
    }      
  }

  if(!isset($_SESSION['loginusu']))
     echo '<p style="color:crimson; text-align:center; margin-top:20px;">Login incorrecto</p>';   
}

endPage();
?>