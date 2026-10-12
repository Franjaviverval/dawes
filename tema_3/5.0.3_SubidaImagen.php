<?php require_once('5.0.3_uploadImage.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="subida.css">
</head>
<body>
   <header class="header-page">
    <h1 class="title-page">5.0.3_SubidaImagen</h1>
  </header>
<main> 
   <section class="upload">
      <?php
         showMessage($message, $result);
      ?>      
      <article class="upload__form-container">
         <form action="" method="post" class="simple-form" enctype="multipart/form-data">
            <h2 class="simple-form__title">Subir imagen</h2>
            <div class="simple-form__element">              
               <input type="file" name="file" class=" simple-input simple-button file-input" id="input-file" accept="image/*" required>
            </div>            
            <nav class="simple-form__nav">
               <button type="submit" class="simple-button">Subir imagen</button>
            </nav>
         </form>
      </article>      
   </section>

   <section class="upload-images">
      <?php showCards(); ?>
   </section>

</main>
</body>
</html>