<?php

setcookie('nombreusu', '', time() - 300);
setcookie('colorusu', '', time() - 300);

header('Location:index.php');
?>