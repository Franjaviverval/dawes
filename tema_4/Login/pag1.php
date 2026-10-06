<?php
require_once('../../templates/page.php');

initPage('Pag1.php', '../../styles/styles.css');

require('cabecera.inc');

echo '<p style="margin-top: 50px;">Bienvenido a pag1.php <span style="color:var(--accent-color);">'.$_SESSION['loginusu'].'</span></p>';

endPage();
?>