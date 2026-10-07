<?php
require_once('../templates/page.php');
require_once('../templates/table.php');

function showProducts(array $productos) : string{
  $code = '<section style="margin-bottom:60px; display:flex; flex-direction: column; gap: 20px;">';

  $code .= '<h2>Lista de articulos</h2>';
  $code .= '<ul style="list-style: none; display:flex; flex-wrap:wrap; gap:30px">';   
    foreach($productos as $producto){
      $link = "5.0.3_Carro.php?v={$producto['id']}";          
      $code .= '<li> <a class="simple-button" href="'.$link.'">'.$producto['nombre'].' - '.$producto['precio'].' euros</a></li>';
    }
    $code .= '</ul>'; 
  return $code.'</section>';
}

function getProduct(int $id, array $products) : array | NULL{
  foreach($products as $product){
    if($product['id'] == $id)
      return $product;
  }
  return NULL;
}

function addProduct(int $id, array $products) : void{
  if(!isset($_SESSION['cart']))
    $_SESSION['cart'] = ['products' => [], 'total' => 0];

  $product = getProduct($id, $products);
  if(isset($product)){
    $_SESSION['cart']['products'][] = $product;
    $_SESSION['cart']['total'] += $product['precio'];
  }
}

function showCart() : string{
  if(!isset($_SESSION['cart']))
    return '';

  $table = drawInitTable().drawTableHeader('Artículo', 'Precio');

  foreach($_SESSION['cart']['products'] as $product){
    $table .= drawTableData($product['nombre'], $product['precio'].' euros');
  }
  
  $table .= drawTableData('<span style="font-weight:bold;color:crimson;">TOTAL</span>', $_SESSION['cart']['total'].' euros');

  return $table.drawEndTable();
}

session_start();
initPage('Carro.php');

printStatement('
<p>Crea una página llamada carro.php con una lista de enlaces de diferentes artículos y su precio.</p>
<p>Puedes alimentar la lista desde un array de artículos previamente definido en PHP.</p>
<p>Cada vez que el usuario haga clic en un artículo, se enviará a la propia página, recogerá el códigoo id del artículo (que se le enviará como parámetro),  buscará el artículo en el catálogo y acumulará en sesión el total de lo que ha ido comprando, junto con un listado de los artículos que ha seleccionado, para mostrarlo todo por pantalla.</p>');

$articulos = array(
array("id" => 1, "nombre" => "Zapatillas Nike", "precio" => 60),
array("id" => 2, "nombre" => "Sudadera Domyos", "precio" => 15),
array("id" => 3, "nombre" => "Pala de pádel Vairo", "precio" => 50),
array("id" => 4, "nombre" => "Pelota de baloncesto Molten", "precio" => 20)
);

if(isset($_GET['v']))
  addProduct($_GET['v'], $articulos);

echo showProducts($articulos);
echo showCart();

endPage();
?>