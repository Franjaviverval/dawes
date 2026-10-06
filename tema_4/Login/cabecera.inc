<?php

session_start();

if(isset($_SESSION['loginusu'])){
  echo '
    <nav style="display:flex; justify-content:space-between;">
      <div>
        <a href="index.php" class="simple-button" style="text-decoration:none; margin: 20px;">Index</a>
        <a href="pag1.php" class="simple-button" style="text-decoration:none; margin: 20px;">Pagina 1</a>
        <a href="pag2.php" class="simple-button" style="text-decoration:none; margin: 20px;">Pagina 2</a>
      </div>
      <div>
        <a href="logout.php" class="simple-button" style="text-decoration:none;">Cerrar Sesión</a>
      </div>
    </nav>';

}else{
  header('Location:login.php');
  exit();
}

?>