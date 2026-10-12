<?php

$message = '';
$result  = false;

function showImage(&$result) : string{
   if($result)
      return "<img src=\"uploads\\{$_FILES['file']['name']}\">";
   return '';
}

function showMessage(string $message, bool $result) : void{
   $code = '<article class="message"><picture class="messages__image">';
   $code .= showImage($result).'</picture>';
   if(!$result)
      $code .= $message;
   else{      
      $code .= $message;
   }

   echo $code.'</article>';
}

function uploadImage(&$message) : bool{   
   if(!is_uploaded_file($_FILES['file']['tmp_name'])){
      $message = '<p class="message message_error">Error al subir la imagen</p>';  
      return false;
   }

   if(explode('/', $_FILES['file']['type'])[0] !== 'image'){
      $message = '<p class="message message_error">Error debe subir una imagen</p>';
      return false;
   }

   $size = getimagesize($_FILES['file']['tmp_name']);
   move_uploaded_file($_FILES['file']['tmp_name'], "uploads/{$_FILES['file']['name']}");
   $message = '<p class="message message_ok">Imagen '.$_FILES['file']['name'].' subida correctamente</p>'; 
   $message .= '<p class="message message_ok">tamaño: '."{$size[0]}X{$size[1]}".'</p>';
   return true;
}

function showCards(){
   $files = scandir('uploads');
   $code = '';
   foreach($files as $file){
      if($file == '.' || $file == '..')
         continue;      
      $code .= '<article class=card> <img src="uploads/'.$file.'">';
      $code .= "<p>{$file}</p>".'</article>';
   }
   echo $code;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
   $result = uploadImage($message);         
   if($result)
      header("refresh:5; url={$_SERVER['PHP_SELF']}");
}


?>