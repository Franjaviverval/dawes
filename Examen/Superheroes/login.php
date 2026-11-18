<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
   <main>

   <article class="form-container">
      <h1 class="title">LOGIN</h1>
      <form action="index.php" method="post" class="form">
         <label for="user" class="form__label">Usuario</label>
         <input type="text" name="user" id="user" class="form__input">
         <label for="password" class="form__label">Contraseña</label>
         <input type="password" name="password" id="password" class="form__input">
         <input type="submit" name="acceder" value="acceder" class="form__submit">
      </form>
   </article>
   </main>
</body>
</html>