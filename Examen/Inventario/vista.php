<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inventario</title>
   <link rel="stylesheet" href="styles.css">
</head>
<body>
      
   <header class="header">
      <h1 class="header__title">Panel de Inventario</h1>
   </header>

   <main>

      <section class="info">

         <article class="info__card">
            <h2 class="info__title">Total Stock</h2>
            <p class="info__text"><?= $this->getValor(); ?>  €</p>
         </article>

         <article class="info__card">
            <h2 class="info__title">Categorías</h2>
            <p class="info__text"><?= $this->getCategorias(); ?></p>
         </article>

      </section>

      <section class="inventario">

      <table class="table">
         <thead>
            <tr>
               <th>ID</th>
               <th>Nombre</th>
               <th>Categoria</th>
               <th>Precio</th>
               <th>Stock</th>
               <th>Estado</th>
            </tr>
         </thead>

         <tbody>
         <?php foreach($this->productos as $producto): ?>
            <tr>
               <td><?= $producto->getId(); ?></td>
               <td><?= $producto->getNombre(); ?></td>
               <td><?= $producto->getCategoria(); ?></td>
               <td><?= $producto->getPrecio(); ?></td>
               <td><?= $producto->getStock(); ?></td>
               <td><?= $producto->getEstado(); ?></td>
            </tr>
         <?php endforeach; ?>
         </tbody>
      </table>

      </section>

   </main>

</body>
</html>