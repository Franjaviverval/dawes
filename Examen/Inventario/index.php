<?php

require_once('inventario.php');

$datosDeEntrada = [ ["id" => 1, "nombre" => "Portátil Gaming", "precio" => 1199.99, "stock" => 10, "categoria" => "Electrónica"], ["id" => 2, "nombre" => "Ratón Inalámbrico", "precio" => 45.50, "stock" => 3, "categoria" => "Electrónica"], ["id" => 3, "nombre" => "Teclado Mecánico", "precio" => 89.90, "stock" => 0, "categoria" => "Electrónica"], ["id" => 4, "nombre" => "Silla de Oficina", "precio" => 150.00, "stock" => 7, "categoria" => "Muebles"], ["id" => 5, "nombre" => "Cafetera Express", "precio" => 79.95, "stock" => 12, "categoria" => "Electrodomésticos"] ];

$inventario = new Inventario($datosDeEntrada);

$inventario->mostrar();

?>