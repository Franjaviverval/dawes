<?php

setcookie('nombreusu', $_REQUEST['user'], time() + 300);
setcookie('colorusu', $_REQUEST['color'], time() + 300);

header("Location:index.php");
exit();
?>