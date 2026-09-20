<?php
require_once('../templates/page.php');

initPage('7.0.4_CompruebaLogin.php');

$registeredUsers = array('user1' => '12345678', 'user2' => '1234');

$validation = array('user' => false, "password" => false);

if(in_array($_POST['user'], array_keys($registeredUsers))){
  $validation['user'] = true;
  if($registeredUsers[$_POST['user']] === $_POST['password'])
    $validation['password'] = true;
}

if(in_array(false, $validation))
  require('7.0.4_Ko.php');
else
  require('7.0.4_Ok.php');

endPage();
?>