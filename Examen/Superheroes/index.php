<?php

session_start();

define('FICHERO', 'resources/heroes.csv');

function verificar() : bool{
   $user = trim($_POST['user'] ?? '');
   $password = trim($_POST['password'] ?? '');

   if( ($user == 'DC' || $user == 'MARVEL') && $password == '1234'){
      $_SESSION['user'] = $user;
      return true;
   }

   return false;
}

function leerDatos($marca) : array{
   $heroes = [];

   if($fp = fopen(FICHERO, "r")){
      fgets($fp);

      while(!feof($fp)){
         $linea = fgets($fp);
         $data = explode(';', $linea);

         $heroe = [ "superhero" => $data[0], "publisher" => $data[1], "alter_ego" => $data[2], "first_appearance" => $data[3],
                    "characters" => $data[4], "picture" => $data[5] ];

         if( ($marca == 'DC' && $heroe['publisher'] == 'DC Comics') || ($marca == 'MARVEL' && $heroe['publisher'] == 'Marvel Comics'))
            $heroes[] = $heroe;
      }

      fclose($fp);
   }
   return $heroes;
}

function mostrarHeroes() : void{
   $heroes = leerDatos($_SESSION['user']);
   include_once('heroes.php');
}


if(!isset($_SESSION['user'])){

   if(isset($_POST['acceder']) && verificar()){     
      mostrarHeroes();
   }
   else{
      header('Location: login.php');
      exit();
   }
}
else
   mostrarHeroes();


?>