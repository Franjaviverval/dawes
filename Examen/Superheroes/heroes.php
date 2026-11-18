<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Superhéroes</title>
   <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
   <header class="header">
      <h1 class="header__title">Listado de Superhéroes</h1>
   </header>

   <section class="heroes">
      
    <?php foreach($heroes as $heroe): ?>         
      <article class="heroe">
         <img src="<?= 'resources/'.$heroe['picture']; ?>" alt="<?= $heroe['superhero']. "imagen"; ?>" class="heroe__img">
         <h2 class="heroe__name" bold><?= $heroe['superhero']; ?></h2>
         <p class="heroe__publisher"><?= $heroe['publisher']; ?></p>
         <p class="heroe__alter-ego bold">Alter Ego: <?= $heroe['alter_ego']; ?></p>
         <p class="heroe__appearance"><span class="bold">Aparición: </span><?= $heroe['first_appearance']; ?></p>
      </article>   
    <?php endforeach?>

    </section>
</body>
</html>