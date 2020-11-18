<?php 
session_start();
include 'functions.php';

$user = $_SESSION['usuario'];
if ($user) {
    if (!$user || $user['Tipo'] == "admin") {
        header('Location: ../index.php');
    }
} else {
    header('Location: ../index.php');
}
$Clfunctions = new Functions();
if(!isset($_SESSION['carrito'])){header("Location: dashboard.php");} 
$arreglo  = $_SESSION['carrito'];
$total= 0;
for($i=0; $i<count($arreglo);$i++){
  $total = $total+($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
}

$fecha = date('Y-m-d h:m:s');
$id_ventas = $Clfunctions-> saveVentas($user['id_usuario'],$total,$fecha );

for($i=0; $i<count($arreglo);$i++){

  $Clfunctions-> saveProductoVenta($id_ventas,$arreglo[$i]['Id'],$arreglo[$i]['Cantidad'],$arreglo[$i]['Precio'],$arreglo[$i]['Cantidad']*$arreglo[$i]['Precio']);

$Clfunctions-> updateInventario($arreglo[$i]['Id'],$arreglo[$i]['Cantidad']);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Gracias Por Su Compra!</h2>
            <p class="lead mb-5">Su Pedido Se Realizó Correctamente.</p>
            <p><a href="verpedipro.php" class="btn btn-sm btn-primary">Ver Pedido</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>