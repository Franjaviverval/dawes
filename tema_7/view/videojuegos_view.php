<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Videojuegos</title>
   <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
   <header class="page-header">
      <h1 class="page-header__title">Videojuegos</h1>
   </header>
   <main>
      <section class="form_section"> 
         <?php if(!$edit): ?>        
         <article class="form_container">
            <h2 class="form__title">Añadir nuevo título</h2>
            <form action="index.php" method="post" class="form">               
               <label for="title" class="form__label">Título</label>
               <input type="text" name="title" id="title" class="form__input" placeholder="título">
               <label for="gender" class="form__label">Género</label>
               <input type="text" name="gender" id="gender" class="form__input" placeholder="Plataformas">               
               <label for="price" class="form__label">Precio</label>
               <input type="number" name="price" id="price" class="form__input" step="0.01" min="0.0" placeholder="0.0">
               <input type="hidden" name="action" value="create"> 
               <nav class="form__nav">
                  <button type="submit" class="form__button" id="button-insert">Insertar</button>
               </nav>                             
            </form>
         </article>     
         <?php else: ?>
            <article class="form_container">
            <h2 class="form__title">Editar</h2>
            <form action="index.php" method="post" class="form">               
               <label for="title" class="form__label">Título</label>
               <input type="text" name="title" id="title" class="form__input" placeholder="título" value=" <?php echo $data[$pos]['titulo'];?> ">
               <label for="gender" class="form__label">Género</label>
               <input type="text" name="gender" id="gender" class="form__input" placeholder="Plataformas" value=" <?php echo $data[$pos]['genero'];?> ">               
               <label for="price" class="form__label">Precio</label>
               <input type="number" name="price" id="price" class="form__input" step="0.01" min="0.0" placeholder="0.0" value= <?php echo $data[$pos]['precio'];?>>
               <input type="hidden" name="action" value="modify"> 
               <input type="hidden" name="id" value= <?php echo $id;?>>
               <nav class="form__nav">
                  <button type="submit" class="form__button" id="button-modify">Editar</button>                   
                  <button type="cancel" class="form__button" id="button-cancel">Cancelar</button>
               </nav>                             
            </form>
         </article>
         <?php endif; ?>    
      </section>
      <section class="data__section">         
         <table class="table">
            <thead>
               <tr>
                  <th></th>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Género</th>
                  <th>Precio</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach($data as $videojuego) : ?>
               <tr>
                  <td>
                     <nav>
                        <form action="index.php" method="post" class="table__form">
                           <input type="hidden" name="action" value="eliminate">
                           <input type="hidden" name="id" value="<?php echo "{$videojuego['id']}"; ?>">
                           <button type="submit" class="table__button" id="button-eliminar"></button>
                        </form>
                        <form action="index.php" method="post" class="table__form">
                           <input type="hidden" name="action" value="edit">
                           <input type="hidden" name="id" value="<?php echo "{$videojuego['id']}"; ?>">
                           <button type="submit" class="table__button" id="button-edit"></button>
                        </form>
                     </nav>
                  </td>
                  <td><?php echo $videojuego['id']; ?></td>
                  <td><?php echo $videojuego['titulo']; ?></td>
                  <td><?php echo $videojuego['genero']; ?></td>
                  <td><?php echo $videojuego['precio']; ?></td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>         
      </section>
   </main>
</body>
</html>